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
            'code' => 'required|unique:customers,code',
            'name' => 'required|max:255',
            'age' => 'required',
            'area_id' => 'required',
        ];
    }
}
