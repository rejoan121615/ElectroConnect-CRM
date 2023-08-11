<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
  return view('pages.home');
})->middleware('auth');

// authentication 
// Route::get('user/login', [AuthController::class, 'index']);
// Route::post('user/auth', [AuthController::class, 'auth']);
// Route::get('user/register', [AuthController::class, 'create']);
// Route::post('user/store', [AuthController::class, 'store']);

Route::prefix('user')->group(function () {
  Route::get('login', [UserController::class, 'index'])->name('login');
  Route::post('auth', [UserController::class, 'auth'])->name('auth');
  Route::get('register', [UserController::class, 'create'])->name('register');
  Route::post('store', [UserController::class, 'store'])->name('store');
  Route::get('recovery', [UserController::class, 'recovery'])->name('recovery');
  Route::post('recovery', [UserController::class, 'getRecovery']);
  Route::post('logout', [UserController::class, 'logout'])->name('logout');
});


Route::middleware('auth')->group(function () {
  Route::resource('product', ProductController::class);
  Route::resource('catagory', CategoryController::class);
  Route::resource('brands', BrandController::class);
  Route::resource('sales', SalesController::class);
});