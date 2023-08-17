<?php

use App\Http\Controllers\AjaxApiController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//   return view('pages.home');
// })->middleware('auth');

// Route::get('/', function () {
//   return view('pages.home');
// })->middleware('auth');

// authentication 
// Route::get('user/login', [AuthController::class, 'index']);
// Route::post('user/auth', [AuthController::class, 'auth']);
// Route::get('user/register', [AuthController::class, 'create']);
// Route::post('user/store', [AuthController::class, 'store']);

// Route::prefix('user')->group(function () {
//   Route::get('login', [UserController::class, 'index'])->name('login');
//   Route::post('auth', [UserController::class, 'auth'])->name('auth');
//   Route::get('register', [UserController::class, 'create'])->name('register');
//   Route::post('store', [UserController::class, 'store'])->name('store');
//   Route::get('recovery', [UserController::class, 'recovery'])->name('recovery');
//   Route::post('recovery', [UserController::class, 'getRecovery']);
//   Route::post('logout', [UserController::class, 'logout'])->name('logout');
// });


Route::prefix('/')->group(function () {

  // api routes 
  Route::get('sales/customers', [SalesController::class, 'customers']);



  // resource route 
  Route::get('/', function () {
    return view('pages.home');
  });
  Route::resource('product', ProductController::class);
  Route::resource('category', CategoryController::class);
  Route::resource('brand', BrandController::class);
  Route::resource('sales', SalesController::class);




  // Route::get('sales/invoice', [SalesController::class, 'invoice']);
  // Route::get('sales/return', [SalesController::class, 'return']);
  Route::resource('inventory', InventoryController::class);
});


Route::prefix('api')->group(function () {
  Route::get('customers', [AjaxApiController::class, 'customers']);
  Route::get('products', [AjaxApiController::class, 'products']);
});
