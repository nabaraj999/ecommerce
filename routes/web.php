<?php

use App\Http\Controllers\Frontend\GoogleLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\UserController;
use App\Models\Order;

Route::get('/home', function () {
    return redirect()->route('home');
});



Route::get("/",[PageController::class,'home'])->name('home');
Route::post("/vendor-request", [PageController::class, 'vendor_request'])->name('vendor_request');
Route::get("/product/{id}", [PageController::class, 'product'])->name('product');
Route::get("/shop/{id}",[PageController::class,'shop'])->name('shop');
Route::get("/compare", [PageController::class, 'compare'])->name('compare');

Route::middleware(['auth'])->group(function () {
    Route::post("/add-to-cart", [UserController::class, 'add_to_cart'])->name('add_to_cart');
    Route::get("/carts", [UserController::class, 'carts'])->name('carts');
    Route::get("/checkout/{id}", [UserController::class, 'checkout'])->name('checkout');
    Route::post("/order_store/{id}", [UserController::class, 'order_store'])->name('order_store');
});


// login with google
// Login with google
Route::get('/google/redirect', [GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');



Route::get("/detail/{record}", function($record){
    $order = Order::find($record);
    return view('order_details', compact('order'));
})->name('detail');

 Route::fallback (function (){
    return view('404');

 });
