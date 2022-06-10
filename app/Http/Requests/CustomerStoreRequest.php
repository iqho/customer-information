<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'customers.*.code' => 'required|unique:customers,code',
            'customers.*.name' => 'required|max:255',
            'customers.*.age' => 'required',
            'customers.*.area_id' => 'required',
        ];
    }
}
