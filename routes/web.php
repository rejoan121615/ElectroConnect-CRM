<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\AjaxApiController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MeetingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//   return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {


  Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

  // profile 
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


  Route::get('sales/customers', [SalesController::class, 'customers']);


  Route::resource('product', ProductController::class);
  Route::resource('category', CategoryController::class);
  Route::resource('brand', BrandController::class);
  Route::get('sales/invoice/download/{id}', [InvoiceController::class, 'download'])->name('invoice.download');
  Route::resource('sales/invoice', InvoiceController::class);
  Route::resource('sales', SalesController::class);
  Route::resource('/inventory', InventoryController::class);
  Route::resource('/supplier', SupplierController::class);
  Route::resource('/customer', CustomerController::class);
  Route::resource('/meeting', MeetingController::class);
  Route::resource('/task', TasksController::class);


  Route::prefix('api')->group(function () {
    Route::get('customers', [AjaxApiController::class, 'customers']);
    Route::get('products', [AjaxApiController::class, 'products']);
    Route::post('store', [AjaxApiController::class, 'store']);
  });
});



require __DIR__ . '/auth.php';
