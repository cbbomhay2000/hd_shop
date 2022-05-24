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

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('adminlogin');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->group(function () {
        //login route
        Route::get('/login', [App\Http\Controllers\Admin\Auth\AuthenticateSessionController::class, 'create'])->name('login');
        Route::post('/adminlogin', [App\Http\Controllers\Admin\Auth\AuthenticateSessionController::class, 'store'])->name('adminlogin');
        Route::get('/destroy', [App\Http\Controllers\Admin\Auth\AuthenticateSessionController::class, 'destroy'])->name('destroy');
    });
    Route::get('/index', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');

});