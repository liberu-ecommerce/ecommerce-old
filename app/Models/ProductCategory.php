<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Tables\Traits\TableCache;

class ProductCategory extends Model
{
    use HasFactory, TableCache;

    protected $table = 'product_categories';

    protected $fillable = [
        'name',   
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
