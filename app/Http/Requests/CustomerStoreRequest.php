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
            // 'code' => 'required|unique:customers,code',
            // 'name' => 'required|max:255',
            // 'age' => 'required',
            // 'area_id' => 'required',

            "name"    => ['required', 'array', 'min:1'],
            "name.*"  => ['required', 'min:1'],

            "code"    => ['required', 'array', 'min:1'],
            "code.*"  => ['required', 'min:1', 'unique:customers,code'],

            "age"    => ['required', 'array', 'min:1'],
            "age.*"  => ['required', 'min:1'],

            "area_id"    => ['required', 'array', 'min:1'],
            "area_id.*"  => ['required', 'min:1'],
        ];
    }
}
