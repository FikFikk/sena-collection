<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('pages.admin.index');
// });

Route::prefix('/dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/shop', [DashboardController::class, 'shop'])->name('dashboard.shop');
    Route::get('/about', [DashboardController::class, 'about'])->name('dashboard.about');
    Route::get('/service', [DashboardController::class, 'service'])->name('dashboard.service');
    Route::get('/blog', [DashboardController::class, 'blog'])->name('dashboard.blog');
    Route::get('/contact', [DashboardController::class, 'contact'])->name('dashboard.contact');
    Route::get('/cart', [DashboardController::class, 'cart'])->name('dashboard.cart');
    Route::get('/checkout', [DashboardController::class, 'checkout'])->name('dashboard.checkout');
});

Route::prefix('/')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
});