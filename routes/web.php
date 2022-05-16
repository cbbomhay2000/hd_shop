<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cart', [App\Http\Controllers\HomeController::class, 'cart'])->name('cart');


Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/shop', function () {
    return view('shop');
})->name('shop');

Route::get('/details', function () {
    return view('product-details');
})->name('details');



