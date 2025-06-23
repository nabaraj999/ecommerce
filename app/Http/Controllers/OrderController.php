<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Frontend\BaseController;
use App\Models\Cart;
use App\Models\Company;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth'); // Apply auth middleware to all methods
    // }

    /**
     * Display a listing of the user's orders.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {
            $user = User::find(Auth::user()->id);
            if (!$user) {
                Log::error('No authenticated user found for /orders');
                return redirect()->route('login')->with('error', 'Please log in to view your orders.');
            }

            $orders = $user->orders()->with('orderDescriptions.product')->latest()->paginate(10);
            $carts = $user->carts()->get();
            $company = Company::first() ?? new Company(['logo' => '']);
            return view('orders.index', compact('orders', 'carts', 'company'));
        } catch (\Exception $e) {
            Log::error('Error in OrderController::index: ' . $e->getMessage());
            return redirect()->route('home')->with('error', 'An error occurred while fetching your orders.');
        }
    }

    /**
     * Display the specified order details.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        try {
            $user = User::find(Auth::user()->id);
            if (!$user) {
                Log::error('No authenticated user found for /orders/{id}');
                return redirect()->route('login')->with('error', 'Please log in to view your order.');
            }
//   return $user;
           // $order = $user->orders()->with(['orderDescriptions.product', 'vendor', 'availableAddress'])->findOrFail($id);
$order =$user->orders()->find($id);
// return $order;
            $carts = $user->carts()->get();
            $company = Company::first() ?? new Company(['logo' => '']);
            return view('orders.show', compact('order', 'carts', 'company'));
        } catch (\Exception $e) {
            Log::error('Error in OrderController::show: ' . $e->getMessage());
            return redirect()->route('orders.index')->with('error', 'An error occurred while fetching the order details.');
        }
    }
}
