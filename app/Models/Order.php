<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelLiberu\Tables\Traits\TableCache;

class Order extends Model
{
    use HasFactory, TableCache;

    protected $table = 'orders';

    protected $fillable = [
        'customer_id',
        'order_date',
        'total_amount',
        'payment_status',
        'shipping_status',
    ];

    public function customer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
