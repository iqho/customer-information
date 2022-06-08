<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Area;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CustomerController extends Controller
{
    private $_getColumns = ['id', 'area_id', 'code', 'name', 'age', 'created_at'];

    public function index(){
        $customers = Customer::get($this->_getColumns);
        return view('customers.index', compact('customers'));
    }

    public function create(){
        $locations = Area::get(['id', 'name']);
        return view('customers.create', compact('locations'));
    }

    public function store(Request $request)
    {
        try {
            $codes = $request->codes;
            $names = $request->names;
            $ages = $request->ages;
            $locations = $request->locations;

            $customers = [];

            if (($codes !== NULL) && ($names !== NULL) && ($ages !== NULL) && ($locations !== NULL)) {
                foreach ($names as $i => $name) {

                    $customerCode[] = Customer::where('area_id', $locations[$i])->latest()->first();
                    return $customerCode->code;

                    $customers[] = [
                        'area_id' => $locations[$i],
                        'code' => $codes[$i],
                        'name' => $name,
                        'age' => $ages[$i],
                        "created_at" => Carbon::now(),
                        "updated_at" => Carbon::now(),
                    ];
                }
            }

            if ($customers[$i]) {
                $allCustomers = new Customer;
              //  $allCustomers->insert($customers);
            }

        } catch (QueryException $e) {
            return redirect()->route('customers')->with('status', 'Customer not Added'.$e->getMessage())->with('alertClass', 'alert-danger');
        }

        return redirect()->route('customers')->with('status', 'Customer Added Successfully.')->with('alertClass', 'alert-success');

    }


}

