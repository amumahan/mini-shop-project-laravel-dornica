<?php

namespace App\Http\Requests\Account;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CheckoutStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'province' => [
                'required',
                'persian_alpha',
                'min:2',
                'max:100'
            ],

            'city' => [
                'required',
                'persian_alpha',
                'min:2',
                'max:100'
            ],

            'user_address' => [
                'required',
                'persian_alpha',
                'min:10',
                'max:500'
            ],

            'postal_code' => [
                'required',
                'ir_postal_code'
            ],

            'phone' => [
                'nullable',
                'ir_phone:zero'
            ],

            'description' => [
                'nullable',
                'persian_alpha',
                'max:500'
            ],
        ];
    }
}
