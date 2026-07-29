<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name' => [
                'required',
                'persian_alpha',
                'string',
                'min:3',
                'max:255'
            ],
            'en_name' => [
                'required',
                'string',
                'min:3',
                'max:255'
            ],
            'category_id' => [
                'required',
                'exists:product_categories,id'
            ],
            'price' => [
                'required',
                'numeric',
                'min:0'
            ],
            'discount' => [
                'required',
                'numeric',
                'min:0'
            ],
            'qty' => [
                'required',
                'integer',
                'min:0'
            ],
            'description' => [
                'nullable',
                'persian_alpha',
                'string',
                'min:10'
            ],
            'images' => [
                'required',
                'array'
            ],
            'images.*' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ];
    }
}
