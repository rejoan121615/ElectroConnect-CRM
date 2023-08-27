<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

  // profile 
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


  Route::get('sales/customers', [SalesController::class, 'customers']);



  Route::get('/', function () {
    return view('pages.home');
  })->name('dashboard');
  Route::resource('product', ProductController::class);
  Route::resource('category', CategoryController::class);
  Route::resource('brand', BrandController::class);
  Route::get('sales/invoice/download/{id}', [InvoiceController::class, 'download'])->name('invoice.download');
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
});



require __DIR__ . '/auth.php';
