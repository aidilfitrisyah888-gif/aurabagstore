<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CartController;

// ================= FRONTEND =================

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// ================= DASHBOARD =================

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// ================= PROFILE =================

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// ================= ADMIN =================

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::resource('categories', AdminCategoryController::class);

    Route::resource('products', AdminProductController::class);

    Route::delete(
        'products/images/{image}',
        [AdminProductController::class, 'destroyImage']
    )->name('products.images.destroy');

    Route::patch(
        'products/images/{image}/primary',
        [AdminProductController::class, 'setPrimaryImage']
    )->name('products.images.primary');

    Route::resource('users', AdminUserController::class);

});

Route::get('/keranjang', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/keranjang/tambah/{product}', [CartController::class, 'add'])
    ->name('cart.add');

Route::put('/keranjang/update/{id}', [CartController::class, 'update'])
    ->name('cart.update');

Route::delete('/keranjang/hapus/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');

Route::delete('/keranjang/kosongkan', [CartController::class, 'clear'])
    ->name('cart.clear');

Route::get('/panduan', function () {
    return view('pages.guide');
})->name('guide');

require __DIR__.'/auth.php';