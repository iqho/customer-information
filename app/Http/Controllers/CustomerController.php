<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Area;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CustomerStoreRequest;

class CustomerController extends Controller
{
    private $_getColumns = ['id', 'area_id', 'code', 'name', 'age', 'created_at'];

    public function index(){
        $customers = Customer::get($this->_getColumns);
        return view('customers.index', compact('customers'));
    }

    public function create(){
        $locations = Area::get(['id', 'code', 'name']);
        return view('customers.create', compact('locations'));
    }

    public function store(CustomerStoreRequest $request)
    {
        $validator = Validator::make($input, $rules);

        if ( $validator->fails() ){

            return response()->json(['success'=> $validator->messages()]);

        }

        Customer::insert($request->data);

        return response()->json(['success'=> 'Customer Added SuccessFully']);

    }

    public function checkCode(Request $request){

        try {
            $lastCode = Customer::where('area_id', $request->id)->orderBy('code', 'DESC')->first();

            if($lastCode !== null){
                $newCode = $lastCode->code + 1;
            }
            else{
                $code = Area::where('id', $request->id)->pluck('code');
                $newCode = $code[0].'0001';
            }

            return response()->json(['success'=> $newCode]);

        } catch(QueryException $e){

            return response()->json(['success'=> $e->getMessage()]);

        }
    }

}

