<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        //login route
        Route::get('/login', [App\Http\Controllers\Admin\Auth\AuthenticateSessionController::class, 'create'])->name('login');
        Route::post('/adminlogin', [App\Http\Controllers\Admin\Auth\AuthenticateSessionController::class, 'store'])->name('adminlogin');
    });
    Route::get('/destroy', [App\Http\Controllers\Admin\Auth\AuthenticateSessionController::class, 'destroy'])->name('destroy');
    Route::get('/index', [App\Http\Controllers\Admin\HomeAdminController::class, 'index'])->name('index');
    Route::resources([
        'admin-account' => 'App\Http\Controllers\Admin\AdminController',
    ]);
    Route::resources([
        'user-account' => 'App\Http\Controllers\Admin\UserController',
    ]);
    Route::resources([
        'brands' => 'App\Http\Controllers\Admin\BrandController',
    ]);
    Route::resources([
        'category' => 'App\Http\Controllers\Admin\CategoryController',
    ]);
});
