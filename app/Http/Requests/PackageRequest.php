<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'package_name' => 'required|string|max:100',
            'slug' => 'required|string|max:100|unique:packages,slug',
            'package_type' => 'required',
            'order_limit' => 'required|numeric',
            'product_limit' => 'required|numeric',
            'price'        => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'This field is required',
            'string' => 'This field is must be string',
            'max' => 'This field is must be less than 100 character',
            'numeric' => 'The input are incorrect',
            'slug.unique'   => ' This field is already exist ',
        ];
    }
}
