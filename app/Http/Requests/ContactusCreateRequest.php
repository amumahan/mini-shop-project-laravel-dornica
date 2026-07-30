<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactusCreateRequest extends FormRequest
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
            'mobile'=>[
                'required',
                'ir_mobile:zero',
                'max:128'
            ],
            'description' => [
                'required',
                'persian_alpha',
                'string',
                'min:3',
                'max:500',
            ],
            'name' => [
                'required',
                'persian_alpha',
                'string',
                'min:3',
                'max:100',
            ],
        ];
    }
}
