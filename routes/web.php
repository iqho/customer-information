<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;


Route::get('/', function () {
    return view('customers.index');
});

Route::get('/add-customer', [CustomerController::class, 'create'])->name('customers.create');

Route::get('/areas', function () {
    return view('areas.index');
});

