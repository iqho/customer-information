<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('customers.index');
});

Route::get('/add-customer', function () {
    return view('customers.create');
});

Route::get('/areas', function () {
    return view('areas.index');
});

