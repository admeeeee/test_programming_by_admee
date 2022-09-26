<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('product',ProductController::class);

Route::post('/getProductDetails',[ProductController::class, 'getProductDetails'])->name('get.product.details');
Route::post('/updateProductDetails',[ProductController::class, 'updateProductDetails'])->name('update.product.details');
Route::post('/deleteProduct',[ProductController::class,'deleteProduct'])->name('delete.product');