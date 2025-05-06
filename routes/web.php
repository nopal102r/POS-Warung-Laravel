<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionController;

Route::Resource(name: 'product', controller: ProductController::class);
Route::apiResource(name:'product', controller: ProductController::class);

Route::Resource(name: 'payment', controller: PaymentController::class);
Route::apiResource(name:'payment', controller: PaymentController::class);

Route::Resource(name: 'category', controller: CategoryController::class);
Route::apiResource(name:'category', controller: CategoryController::class);

Route::Resource(name: 'buyer', controller: BuyerController::class);
Route::apiResource(name:'buyer', controller: BuyerController::class);

Route::Resource(name: 'transaction', controller: TransactionController::class);
Route::apiResource(name:'transaction', controller: TransactionController::class);


// Rute untuk halaman dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/', [HomeController::class, 'index'])->name('home');

