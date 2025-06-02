<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/",[PageController::class,'home'])->name('home');
Route::post("/vendor-request", [PageController::class, 'vendor_request'])->name('vendor_request');
