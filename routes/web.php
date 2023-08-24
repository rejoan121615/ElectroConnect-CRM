<?php

use App\Http\Controllers\AjaxApiController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('sales/customers', [SalesController::class, 'customers']);



Route::get('/', function () {
  return view('pages.home');
});
Route::resource('product', ProductController::class);
Route::resource('category', CategoryController::class);
Route::resource('brand', BrandController::class);
Route::get('sales/invoice/download', [InvoiceController::class, 'download'])->name('invoice.download');
Route::resource('sales/invoice', InvoiceController::class);
Route::resource('sales', SalesController::class);
Route::resource('/inventory', InventoryController::class);
Route::resource('/supplier', SupplierController::class);
Route::resource('/customer', CustomerController::class);
Route::resource('/task', TasksController::class);


Route::prefix('api')->group(function () {
  Route::get('customers', [AjaxApiController::class, 'customers']);
  Route::get('products', [AjaxApiController::class, 'products']);
  Route::post('store', [AjaxApiController::class, 'store']);
});
