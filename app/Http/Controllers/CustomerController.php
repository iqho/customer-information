<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create(){
        $locations = Area::get(['id', 'name']);
        return view('customers.create', compact('locations'));
    }
}
