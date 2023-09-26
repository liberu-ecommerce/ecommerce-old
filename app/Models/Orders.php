<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'customer_id',
        'order_date',
        'total_amount',
        'payment_status',
        'shipping_status',
    ];

    public function customers()
    {
        return $this->belongsTo(Customers::class);
    }
}
