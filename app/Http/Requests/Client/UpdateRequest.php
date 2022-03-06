<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            // 'dni'=>'string|required|min:8|max:8|unique:clients,dni,'.$this->tag->id,
            // 'ruc'=>'nullable|string|min:11|max:11|unique:clients,ruc,'.$this->tag->id,
            // 'address'=>'nullable|string|max:255',
            // 'phone'=>'string|nullable|min:9|max:9|unique:clients,phone,'.$this->tag->id,
            'email'=>'string|nullable|max:255|email:rfc,dns|unique:users,email,'.$this->tag->id,
        ];
    }
}
