<?php

use App\Http\Controllers\ProductController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/produk', [ProductController::class, 'index']); 

require __DIR__.'/settings.php';
