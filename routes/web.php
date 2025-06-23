<?php

use App\Http\Controllers\Frontend\GoogleLoginController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\OrderController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

// Redirect /home to home route
Route::get('/home', function () {
    return redirect()->route('home');
});

// Public routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::post('/vendor-request', [PageController::class, 'vendor_request'])->name('vendor_request');
Route::get('/product/{id}', [PageController::class, 'product'])->name('product.show');
Route::get('/products', [PageController::class, 'products'])->name('products.index');
Route::get('/shop/{id}', [PageController::class, 'shop'])->name('shop');
Route::get('/compare', [PageController::class, 'compare'])->name('compare');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::post('/add-to-cart', [UserController::class, 'add_to_cart'])->name('add_to_cart');
    Route::get('/carts', [UserController::class, 'carts'])->name('carts');
    Route::get('/checkout/{id}', [UserController::class, 'checkout'])->name('checkout');
    Route::post('/order_store/{id}', [UserController::class, 'order_store'])->name('order_store');
    Route::get('/khalti', [UserController::class, 'khalti'])->name('khalti');
    Route::post('/cart/update', [UserController::class, 'update'])->name('cart.update');

    // Order routes
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
});

// Google login routes
Route::get('/google/redirect', [GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get("/detail/{record}", function ($record) {
    $order = Order::find($record);
    return view('order_details', compact('order'));
})->name('detail');

// 404 fallback
Route::fallback(function () {
    return view('404');
});
