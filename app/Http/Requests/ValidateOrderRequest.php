<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $this->route('order');

        return [

            'customer_id' => 'required|exists:customers,id',
            'order_date ' => 'required|date',
            'total_amount' => 'required|numeric|min:0',
            'payment_status' => 'required|in:unpaid,paid',
            'shipping_status' => 'required|in:pending,shipped,delivered'
        ];
    }
}
