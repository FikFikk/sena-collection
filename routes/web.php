<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;


// Route::get('/', function () {
//     return view('pages.admin.index');
// });

Route::get('/admin', [AuthController::class, 'login'])->name('login.view');
Route::post('/admin', [AuthController::class, 'auth'])->name('login.auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/home', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/product', [ProductController::class, 'index'])->name('product.index');
        Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    });
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/shop', [DashboardController::class, 'shop'])->name('dashboard.shop');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

Route::get('/about', [DashboardController::class, 'about'])->name('dashboard.about');
Route::get('/service', [DashboardController::class, 'service'])->name('dashboard.service');
Route::get('/blog', [DashboardController::class, 'blog'])->name('dashboard.blog');
Route::get('/contact', [DashboardController::class, 'contact'])->name('dashboard.contact');
Route::get('/cart', [CartController::class, 'show'])->name('dashboard.cart');
Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::post('/cart/remove-item', [CartController::class, 'removeItem'])->name('cart.removeItem');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('dashboard.checkout');

;

