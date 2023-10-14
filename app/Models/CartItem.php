<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelLiberu\Tables\Traits\TableCache;

class CartItem extends Model
{
    use HasFactory, TableCache;
   
    protected $table = 'cart_items';

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
