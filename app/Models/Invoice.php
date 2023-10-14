<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use LaravelEnso\Tables\Traits\TableCache;

class Invoice extends Model
{
    use HasFactory, TableCache;

    protected $table = 'invoices';

    protected $fillable = [
        'customer_id',
        'order_id',
        'invoice_date',
        'total_amount',
        'payment_status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
