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

Route::get('user/profile', [App\Http\Controllers\UserProfileController::class, 'edit'])->name('profile');
Route::put('user/profile', [App\Http\Controllers\UserProfileController::class, 'update'])->name('update-profile');
Route::post('crop', [App\Http\Controllers\UploadController::class, 'crop'])->name('crop');

Route::prefix('admin')->name('admin.')->group(function () {
Route::post('image', [App\Http\Controllers\Admin\UserController::class, 'image'])->name('image');
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
    Route::get('admin-account/{admin_account}', [App\Http\Controllers\Admin\AdminController::class, 'block'])->name('block');

    Route::resources([
        'user-account' => 'App\Http\Controllers\Admin\UserController',
    ]);
    Route::post('user-account/{user_account}', [App\Http\Controllers\Admin\UserController::class, 'image'])->name('image');

    Route::get('user-account/{user_account}', [App\Http\Controllers\Admin\UserController::class, 'block'])->name('block_user');
    Route::get('user-accounts/{user_account}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('show');

    Route::resources([
        'brands' => 'App\Http\Controllers\Admin\BrandController',
    ]);
    Route::resources([
        'category' => 'App\Http\Controllers\Admin\CategoryController',
    ]);
    Route::resources([
        'product' => 'App\Http\Controllers\Admin\ProductController',
    ]);
    Route::resources([
        'shop_item' => 'App\Http\Controllers\Admin\ShopItemController',
    ]);
    Route::resources([
        'product_status' => 'App\Http\Controllers\Admin\ProductStatusController',
    ]);
    Route::get('user/profile', [App\Http\Controllers\AdminProfileController::class, 'edit'])->name('profile');
    Route::put('user/profile', [App\Http\Controllers\AdminProfileController::class, 'update'])->name('update-profile');
    Route::post('crop2', [App\Http\Controllers\UploadController::class, 'crop2'])->name('crop2');
});
