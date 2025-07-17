<?php

use App\Http\Controllers\Api\Cart\CartController;
use App\Http\Controllers\Api\Login\LoginController;
use App\Http\Controllers\Api\Orders\OrderController;
use App\Http\Controllers\Api\Products\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/products', [ProductsController::class, 'index']);

    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [CartController::class, 'add']);
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove']);

    Route::post('/orders', [OrderController::class, 'placeOrder']);
});
