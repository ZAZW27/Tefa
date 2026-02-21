<?php

use App\Http\Controllers\ProductController; 
use App\Http\Controllers\CheckoutController; 

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/produk', [ProductController::class, 'index'])->name('produk'); 

Route::get('/produks/create', [ProductController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('produks.create'); 
Route::get('/produk-store', [ProductController::class, 'store'])
    ->name('produk.store'); 




Route::post('/checkout', [CheckoutController::class, 'store']);

require __DIR__.'/settings.php';
