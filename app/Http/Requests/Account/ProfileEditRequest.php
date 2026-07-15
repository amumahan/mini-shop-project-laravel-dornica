<?php

namespace App\Http\Requests\Account;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileEditRequest extends FormRequest
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

            'first_name'=>[
//                'required',
                'persian_alpha',
                'max:128'
            ],
            'last_name'=>[
//                'required',
                'persian_alpha',
                'max:128'
            ],
            'mobile'=>[
//                'required',
                'ir_mobile:zero',
                'max:128'
            ],
            'email'=>[
//                'required',
                'email',
                'max:200',
                'unique:App\Models\User'
            ],
            'password'=>[
                'nullable',
                'unique:App\Models\User',
                'min:6',
                'max:128'
            ]
        ];
    }
}
