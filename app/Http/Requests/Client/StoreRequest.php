<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=>'string|required|max:255',
            'surnames'=>'string|required|max:255',
            // 'dni'=>'string|required|unique:clients|min:8|max:8',
            // 'ruc'=>'nullable|string|unique:clients|min:11|max:11',
            // 'address'=>'nullable|string|max:255',
            // 'phone'=>'string|nullable|unique:clients|min:9|max:9',
            'email'=>'string|nullable|unique:users|max:255|email:rfc,dns',
        ];
    }
}
