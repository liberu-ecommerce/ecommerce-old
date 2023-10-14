<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Tables\Traits\TableCache;

class Review extends Model
{
    use HasFactory, TableCache;

    protected $table = 'product_reviews';

    protected $fillable = [
        'product_id',
        'customer_id',
        'comments',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
