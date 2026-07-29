<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
            'full_name' => [
                'required',
                'persian_alpha',
                'string',
                'min:3',
                'max:100',
            ],

            'user_name' => [
                'required',
                'string',
                'min:3',
                'max:50',
                'unique:admins,user_name,',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:admins,email',
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'max:100',
            ],

            'status' => [
                'required',
                'integer',
                'in:0,1,2',
            ],
        ];
    }
}
