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

    public function messages()
    {
        return [
            'customers.*.code.required' => 'Customer Code is Required !',
            'customers.*.code.unique' => 'Already Exist ! Customer Code Must be Unique !',

            'customers.*.name.required' => 'Customer Name is Required !',
            'customers.*.name.max' => 'Customer Name cannot be more than 255 characters !',

            'customers.*.age.required' => 'Customer Age is Required !',

            'customers.*.area_id.required' => 'Customer Location is Required !',

        ];
    }


}
