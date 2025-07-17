<?php

use App\Http\Controllers\Admin\products\ProductsController;
use App\Http\Controllers\Admin\Users\UsersController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Roles\RolesController;
use App\Http\Controllers\Users\Cart\CartController;
use App\Http\Controllers\Users\Home\UserHomeController;
use App\Http\Controllers\Users\Orders\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('auth.index');
Route::post('signin', [AuthController::class, 'signIn'])->name('signIn');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::prefix('roles')->group(function () {
    Route::get('/', [RolesController::class, 'index'])->name('roles.index');
    Route::get('list', [RolesController::class, 'list'])->name('roles.list');
    Route::get('edit/{id}', [RolesController::class, 'edit'])->name('roles.edit');
    Route::put('update/{id}', [RolesController::class, 'update'])->name('roles.update');
    Route::get('destroy/{id}', [RolesController::class, 'destroy'])->name('roles.destroy');
});

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('index', [UsersController::class, 'index'])->name('users.index');
    Route::get('list', [UsersController::class, 'list'])->name('users.list');
    Route::get('create', [UsersController::class, 'create'])->name('users.create');
    Route::post('store', [UsersController::class, 'store'])->name('users.store');
    Route::get('edit/{user}', [UsersController::class, 'edit'])->name('users.edit');
    Route::post('users/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::get('destroy/{user}', [UsersController::class, 'destroy'])->name('users.destroy');

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductsController::class, 'index'])->name('products.index');
        Route::get('products/list', [ProductsController::class, 'list'])->name('products.list');
        Route::get('create', [ProductsController::class, 'create'])->name('products.create');
        Route::post('store', [ProductsController::class, 'store'])->name('products.store');
        Route::get('edit/{product}', [ProductsController::class, 'edit'])->name('products.edit');
        Route::post('update/{product}', [ProductsController::class, 'update'])->name('products.update');
        Route::get('destroy/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');
    });
});

Route::prefix('user')->middleware(['auth', 'is_user'])->group(function () {
    Route::get('home', [UserHomeController::class, 'index'])->name('user.home.index');

    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('remove/{cart}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('view', [CartController::class, 'view'])->name('cart.view');
    Route::post('update/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::post('checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    Route::get('orders/history', [OrderController::class, 'history'])->name('orders.history');
});
