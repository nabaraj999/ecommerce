<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Admin;
use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\VendorRequestNotification;
use App\Http\Controllers\Frontend\BaseController;

class PageController extends BaseController
{
    public function home()
    {
        // Get approved vendors
        $vendors = Vendor::where("status", "approved")
                         ->where('expire_date', ">", now())
                         ->orderBy('created_at', 'desc')
                         ->limit(12)
                         ->get();

        // Create empty advertisements collection for now
        $advertises = collect();

        // Get latest 15 products
        $latestProducts = Product::with('vendor')
                                ->where('status', true)
                                ->where('qty', '>', 0)
                                ->orderBy('created_at', 'desc')
                                ->limit(15)
                                ->get();

        return view('frontend.home', compact("vendors", "advertises", "latestProducts"));
    }

    public function vendor_request(Request $request)
    {
        $request->validate([
            "name" => "required|max:50",
            "email" => "required|unique:vendors|max:50|email",
            "address" => "required|max:50",
            "contact_no" => "required",
        ]);

        $vendor = new Vendor();
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->contact_no = $request->contact_no;
        $vendor->address = $request->address;
        $vendor->password = Hash::make("!@#!@#$%");
        $vendor->save();

        $admins = Admin::all();
        Mail::to($admins)->send(new VendorRequestNotification($vendor));

        toast("Your request has been successfully submitted!", "success");
        return redirect()->back();
    }

    public function shop($id)
    {
        $vendor = Vendor::where("status", "approved")->where('id', $id)->first();
        if (!$vendor) {
            return view('404');
        }
        $products = $vendor->products()->where('status', true)->get();
        return view('frontend.vendor', compact("vendor", "products"));
    }

    public function product($id)
    {
        $product = Product::where("status", true)->where('id', $id)->first();
        if (!$product) {
            return view('404');
        }
        return view('frontend.product', compact("product"));
    }

    public function compare(Request $request)
    {
        $q = $request->q;
        $min = $request->min;
        $max = $request->max;

        if (!$min && !$max) {
            $products = Product::where('name', "like", "%$q%")->orderBy("price", "asc")->get();
            return view('frontend.compare', compact("products", "q"));
        }

        $products = Product::where('name', "like", "%$q%")->orderBy("price", "asc")->whereBetween('price', [$min, $max])->get();
        return view('frontend.compare', compact("products", "q", "min", "max"));
    }

    // UPDATED: Enhanced products method with search and sorting
    public function products(Request $request)
    {
        // Start building the query
        $query = Product::with('vendor')->where('status', true);

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('brand', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('vendor', function($vendorQuery) use ($search) {
                      $vendorQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Apply sorting based on request parameter
        switch ($request->get('sort')) {
            case 'price_low':
                $query->orderByRaw('(price - discount) ASC'); // Sort by final price
                break;
            case 'price_high':
                $query->orderByRaw('(price - discount) DESC'); // Sort by final price
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'newest':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        // Include out of stock products but show them last
        $query->orderBy('qty', 'desc'); // Products with stock first

        // Paginate the results
        $products = $query->paginate(20);

        return view('frontend.products', compact('products'));
    }



}
