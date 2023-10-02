<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $this->route('customer');

        return [

            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email|unique:customers,email',
            'phone_number' => 'required|max:50',
            'address' => 'required|max:50',
            'city' => 'required|max:50',
            'state' => 'required|max:50',
            'postal_code' => 'required|max:50',
        ];
    }
}
