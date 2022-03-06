<?php

namespace App\Http\Requests\Provider;

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
            'name'=>'required|string|max:255',
            'email'=>'required|email|string|max:255|unique:providers,email,'.$this->tag->id,
            'ruc_number'=>'required|string|min:11|max:11|unique:providers,ruc_number,'.$this->tag->id,
            'address'=>'nullable|string|max:255',
            'phone'=>'required|string|min:9|max:9|unique:providers,phone,'.$this->tag->id,
        ];
    }
}
