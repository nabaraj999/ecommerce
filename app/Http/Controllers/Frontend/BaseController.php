<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
        View::share([
            "company" => $company,
            "carts" => $carts,
        ]);
    }
}
