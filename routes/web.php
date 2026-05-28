<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\OrderController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/artikel/{kategori?}', [ArticleController::class, 'index'])->name('artikel');
Route::get('/artikel/{kategori}/{slug}', [ArticleController::class, 'show'])->name('artikel.show');

Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.store');

Route::get('/produk', [ProductController::class, 'index'])->name('produk');

Route::get('/dashboard', [AdminDashboardController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::resource('articles', AdminArticleController::class);
        Route::resource('products', AdminProductController::class);
        Route::resource('events', AdminEventController::class);
        Route::resource('galleries', AdminGalleryController::class);
        Route::resource('messages', AdminMessageController::class)->except(['create', 'store', 'edit', 'update']);
        Route::resource('orders', AdminOrderController::class)->only(['index', 'show', 'update']);
    });

    Route::get('/cart', [OrderController::class, 'cart'])->name('cart');
    Route::post('/cart/add/{product}', [OrderController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update/{product}', [OrderController::class, 'updateCart'])->name('cart.update');
    Route::delete('/cart/remove/{product}', [OrderController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});

require __DIR__ . '/auth.php';
