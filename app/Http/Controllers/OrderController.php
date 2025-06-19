<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); // Apply auth middleware to all methods
    }

    /**
     * Display a listing of the user's orders.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $orders = Auth::user()->orders()->with('orderDescriptions.product')->latest()->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Display the specified order details.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $order = Auth::user()->orders()->with('orderDescriptions.product', 'vendor', 'availableAddress')->findOrFail($id);
        return view('orders.show', compact('order'));
    }
}
