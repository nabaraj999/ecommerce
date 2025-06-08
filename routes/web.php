<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\UserController;

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
});

 Route::fallback (function (){
    return view('404');

 });
