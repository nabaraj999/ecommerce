<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Admin;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\VendorRequestNotification;
use App\Http\Controllers\Frontend\BaseController;
use App\Models\Product;

class PageController extends BaseController
{
    public function home()
    {
        $vendors = Vendor::where("status","approved")->where('expire_date',">", now())->get();
        return view('frontend.home',compact("vendors"));
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
        $vendor->password =  Hash::make("!@#!@#$%");
        $vendor->save();
        $admins = Admin::all();
        Mail::to($admins)->send(new VendorRequestNotification($vendor));
        toast("Your request has been successfull submitted!", "success");
        return redirect()->back();
    }

     public function shop($id)
    {
        $vendor = Vendor::where("status","approved")->where('id', $id)->first();
        if(!$vendor){
            return view('404');
        }
        $products=$vendor->products()->where('status',true)->get();
        return view('frontend.vendor',compact("vendor","products"));
    }

     public function product($id)
    {
        $product = Product::where("status", true)->where('id', $id)->first();
        if (!$product) {
            return view('404');
        }
        return view('frontend.product', compact( "product"));
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

}
