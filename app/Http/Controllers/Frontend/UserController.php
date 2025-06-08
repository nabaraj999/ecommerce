<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    public function add_to_cart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $oldCart = Cart::where('product_id', $request->product_id)->first();

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
}
