<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


// authentication 
// Route::get('user/login', [AuthController::class, 'index']);
// Route::post('user/auth', [AuthController::class, 'auth']);
// Route::get('user/register', [AuthController::class, 'create']);
// Route::post('user/store', [AuthController::class, 'store']);

Route::prefix('user')->group(function () {
  Route::get('login', [AuthController::class, 'index']);
  Route::post('auth', [AuthController::class, 'auth']);
  Route::get('register', [AuthController::class, 'create'])->name('register');
  Route::post('store', [AuthController::class, 'store'])->name('store');
});
