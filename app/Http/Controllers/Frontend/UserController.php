<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderNotification;
use App\Models\AvailableAddress;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDescription;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class UserController extends BaseController
{
    public function add_to_cart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $oldCart = Cart::where('product_id', $request->product_id)->where('user_id', Auth::user()->id)->first();

        if ($oldCart) {
            $oldCart->qty = $request->qty + $oldCart->qty;
            $oldCart->amount = $oldCart->qty * $product->price;
            $oldCart->save();
            return redirect()->back();
        }
        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $request->product_id;
        $cart->qty = $request->qty;
        $cart->amount = $request->qty * $product->price;
        $cart->save();
        return redirect()->back();
    }

    public function carts()
    {
        // Step 1: Get user's carts with product and vendor
        $user = User::find(Auth::user()->id);
        $carts = $user->carts()->with('product.vendor')->get();

        // Step 2: Filter products that have an approved vendor
        $approvedCarts = $carts->filter(function ($cart) {
            return $cart->product && $cart->product->vendor && $cart->product->vendor->status === 'approved';
        });

        // Step 3: Group by vendor ID
        $groupedCarts = $approvedCarts->groupBy(function ($cart) {
            return $cart->product->vendor->id;
        });

        // Step 4: Get approved vendors from those vendor IDs
        $vendorIds = $groupedCarts->keys();
        $vendors = Vendor::whereIn('id', $vendorIds)->where('status', 'approved')->get();

        // Step 5: Pass to view
        return view('frontend.carts', compact('vendors', 'groupedCarts'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:carts,id',
            'product_id' => 'nullable|exists:products,id',
            'qty' => 'required|integer|min:0',
            'action' => 'required|in:update,remove',
        ]);

        $cart = Cart::where('id', $request->cart_id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        if ($request->action === 'remove') {
            $cart->delete();
            return response()->json(['success' => true, 'message' => 'Item removed from cart']);
        }

        if ($request->qty < 1) {
            return response()->json(['success' => false, 'message' => 'Quantity must be at least 1']);
        }

        $product = Product::findOrFail($request->product_id);
        $cart->qty = $request->qty;
        $cart->amount = $product->price * $request->qty;
        $cart->save();

        return response()->json(['success' => true, 'message' => 'Cart updated successfully']);
    }

    public function checkout($id)
    {
        $vendor = Vendor::where('id', $id)->where('status', 'approved')->firstOrFail();

        $user = User::find(Auth::user()->id);

        // Get only carts for the specific vendor with approved status
        $vendorCarts = $user->carts()
            ->whereHas('product.vendor', function ($query) use ($id) {
                $query->where('id', $id)->where('status', 'approved');
            })
            ->with('product.vendor')
            ->get();

        $addresses = AvailableAddress::where('vendor_id', $id)->get();
        return view('frontend.checkout', compact('vendor', 'vendorCarts', 'addresses'));
    }

    public function order_store(Request $request, $id)
    {
        $vendor = Vendor::where('id', $id)->where('status', 'approved')->firstOrFail();

        $user = User::find(Auth::user()->id);

        // Get only carts for the specific vendor with approved status
        $vendorCarts = $user->carts()
            ->whereHas('product.vendor', function ($query) use ($id) {
                $query->where('id', $id)->where('status', 'approved');
            })
            ->with('product.vendor')
            ->get();

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->vendor_id = $id;
        $order->payment_method = $request->payment;
        $order->address_note = $request->address_note;
        $order->available_address_id = $request->address;
        $order->contact = $request->contact;
        $order->total_amount = $vendorCarts->sum('amount');
        $order->save();
        $products = [];
        foreach ($vendorCarts as $key => $cart) {
            $od = new OrderDescription();
            $od->product_id = $cart->product_id;
            $od->order_id = $order->id;
            $od->qty = $cart->qty;
            $od->amount = $cart->amount;
            $products[] = $cart->product->name;
            $cart->delete();
            $od->save();
        }
        if ($request->payment == "khalti") {
            Cookie::queue("orderId", $order->id);

            $response = Http::withHeaders([
                "Authorization" => "Key " . env('KHALTI_SECRET_KEY')
            ])->post(env('KHALTI_BASE_URL') . "/epayment/initiate/", [
                "return_url" => env("KHALTI_RETURN_URL"),
                "website_url" => env("APP_URL"),
                "amount" => $order->total_amount * 100,
                "purchase_order_id" => $order->id,
                "purchase_order_name" => $products[0],
                "customer_info" => Auth::user(),
            ]);

            return redirect($response['payment_url']);
        }
        Mail::to($vendor)->send(new OrderNotification($order));
        return redirect()->back();
    }

    public function khalti(Request $request)
    {
        $response = Http::withHeaders([
            "Authorization" => "Key " . env('KHALTI_SECRET_KEY')
        ])->post(env('KHALTI_BASE_URL') . "/epayment/lookup/", [
            "pidx" => $request->pidx,
        ]);
        $orderId = Cookie::get("orderId");
        $order = Order::find($orderId);
        $order->payment_status = $response['status'];
        $order->save();
        return redirect('/');
    }
}
