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

    public function store(Request $request)
    {

        try {
            $codes = $request->codes;
            $names = $request->names;
            $ages = $request->ages;
            $area_ids = $request->area_ids;

            $customers = [];

            foreach ($codes as $i => $code) {

                $customers[] = [
                    'area_id' => $area_ids[$i],
                    'code' => $code,
                    'name' => $names[$i],
                    'age' => $ages[$i],
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ];
            }

            if ($customers[$i]) {
                $allCustomers = new Customer;
                $allCustomers->insert($customers);
            }

        } catch (QueryException $e) {
            return redirect()->back()->with('status', 'Customer not Added'.$e->getMessage())->with('alertClass', 'alert-danger');
        }

        return redirect()->route('customers')->with('status', 'Customer Added Successfully.')->with('alertClass', 'alert-success');

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

