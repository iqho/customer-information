<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;


Route::get('/', [CustomerController::class, 'index'])->name('customers');
Route::get('/add-customer', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/store-customer', [CustomerController::class, 'store'])->name('customers.store');
Route::post('/check-customer-code', [CustomerController::class, 'checkCode'])->name('customers.checkCode');

Route::get('/areas', function () {
    return view('areas.index');
});

