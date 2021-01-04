<?php

namespace App\Http\Requests\Product;

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

            'name'=>'string|required|unique:products,name,'.$this->route('product')->id.'|max:255',
            
            'sell_price'=>'required',
            'category_id'=>'integer|required|exists:App\Category,id',
            'provider_id'=>'integer|required|exists:App\Provider,id',

             'code'=>'nullable|string|max:8|min:8',   
        ];
    }
    public function messages()
    {
        return[
            'name.string'=>'El valor no es correcto.',
            'name.required'=>'El campo es requerido.',
            'name.unique'=>'El producto ya está registrado.',
            'name.max'=>'Solo se permite 255 caracteres.',

            'code.string'=>'El valor no es correcto.',
            'code.max'=>'Solo se permite 8 dígitos.',
            'code.min'=>'Se requiere de 8 dígitos.',

            'sell_price.required'=>'El campo es requerido.',

            'category_id.integer'=>'El valor tiene que ser entero.',
            'category_id.required'=>'El campo es requerido.',
            'category_id.exists'=>'La categoría no existe.',

            'provider_id.integer'=>'El valor tiene que ser entero.',
            'provider_id.required'=>'El campo es requerido.',
            'provider_id.exists'=>'El proveedor no existe.',
        ];
    }
}
