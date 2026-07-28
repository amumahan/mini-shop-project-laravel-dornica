<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
                'nullable',
                'persian_alpha',
                'max:128'
            ],
            'last_name'=>[
                'nullable',
                'persian_alpha',
                'max:128'
            ],
            'mobile'=>[
                'nullable',
                'ir_mobile:zero',
                'max:128',
//                'unique:App\Models\User'.auth()->id()
            ],
            'email'=>[
                'nullable',
                'email',
                'max:200',
//                'unique:App\Models\User'.auth()->id()
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
