<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    public function __construct()
    {
        $company = Company::first();
        $carts = [];
        if(Auth::user()){
            $carts = Auth::user()->carts;
        }
        $advertises = Advertise::where('expire_date', '>=', date('Y-m-d'))->get();
        View::share([
            "company" => $company,
            "carts" => $carts,
            "advertises" => $advertises,
        ]);
    }
}
