<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;

// Rutas públicas
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/catalogo', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/categoria/{category:slug}', [CatalogController::class, 'category'])->name('catalog.category');
Route::get('/producto/{product:slug}', [CatalogController::class, 'show'])->name('product.show');

// Páginas estáticas
Route::get('/quienes-somos', [PageController::class, 'about'])->name('pages.about');
Route::get('/contacto', [PageController::class, 'contact'])->name('pages.contact');
Route::post('/contacto', [ContactController::class, 'store'])->name('contact.store')->middleware('throttle:5,1');

// Rutas de carrito (requieren autenticación)
Route::middleware('auth')->group(function () {
    Route::get('/carrito', [CartController::class, 'index'])->name('cart.index');
    Route::post('/carrito/agregar', [CartController::class, 'add'])->name('cart.add');
    Route::put('/carrito/{item}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/carrito/{item}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/carrito', [CartController::class, 'clear'])->name('cart.clear');

    // Rutas de checkout y pedidos
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/mis-pedidos', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/mis-pedidos/{order}', [OrderController::class, 'show'])->name('orders.show');
});

// Rutas de administración
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('brands', \App\Http\Controllers\Admin\BrandController::class);
    Route::get('/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [\App\Http\Controllers\Admin\OrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}/status', [\App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])->name('orders.update-status');
});

// Rutas de autenticación (Breeze)
require __DIR__.'/auth.php';
