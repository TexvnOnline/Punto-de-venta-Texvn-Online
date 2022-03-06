<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'paymentmethod' => 'required|exists:payment_platforms,id',
            'email' => 'nullable|email:rfc,dns',
            'payu_email' => 'nullable|email:rfc,dns'
        ];
    }
}
