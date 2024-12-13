<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::resource('categories', CategoryController::class);
Route::get('/transaction-cetak', [CategoryController::class, 'cetak'])->name('transaction.cetak');
Route::get('/', function () {
    return view('welcome');
});
