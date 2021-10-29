<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
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
    return redirect('/product');
});

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('list');
    Route::get('/{product_id}', [ProductController::class, 'edit'])->name('editProduct');
    Route::post('/{product_id}', [ProductController::class, 'update'])->name('updateProduct');
    Route::post('/submit/sell', [ProductController::class, 'sellProduct'])->name('sell');
});

Route::prefix('transaction')->group(function () {
    Route::get('/', [TransactionController::class, 'index'])->name('transactions');
});