<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $this->route('product');

        return [
            'name' => 'required|max:255',
            'short_description' => 'required',
            'long_description' => 'required',
            'category_id' => 'required|exists:product_categories,id',
            'is_variable' => 'boolean',
            'is_grouped' => 'boolean',
            'is_simple' => 'boolean',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
