<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateInvoiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $this->route('invoice');

        return [
            'invoice_date' => 'required',
            'customer_id' => 'required|exists:customers,id',
            'order_id' => 'required|exists:orders,id',
            'total_amount' => 'required|numeric|min:0',
            'payment_status' => 'required|in:unpaid,paid',
        ];
    }
}
