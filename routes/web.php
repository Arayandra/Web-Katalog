<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('catalog.index');
Route::get('/produk/{slug}', [ProductController::class, 'show'])
    ->where('slug', '[A-Za-z0-9-]+')
    ->name('catalog.show');
