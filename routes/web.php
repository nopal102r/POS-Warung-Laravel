<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Hanya bisa diakses jika sudah login
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});



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

Route::Resource(name: 'dashboard', controller: DashboardController::class);
Route::apiResource(name:'dashboard', controller: DashboardController::class);

Route::Resource(name: 'home', controller: HomeController::class);
Route::apiResource(name:'home', controller: HomeController::class);

Route::get('/transaction/{id}', [TransactionController::class, 'show'])->name('transaction.show');



Route::get('/', [HomeController::class, 'index'])->name('home');

