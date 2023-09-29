<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCartRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $this->route('cart');
        return [
            'product_id' => 'required|exists:cartitems,i',
            'quantity' => 'required|integer|min:1',
            'price' => 'nullable|numeric|min:0',
        ];
    }
}
