<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'short_name' => 'required|string|max:10',
            'direction' => 'required|in:ltr,rtl',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'This field is required',
            'string' => 'This field is must be string',
            'name.max' => 'This field is must be less than 100 character',
            'short_name.max' => 'This field is must be less than 10 character',
            'in' => 'The inputs are incorrect',
        ];
    }
}
