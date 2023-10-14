<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelLiberu\Tables\Traits\TableCache;

class UserSocial extends Model
{
    use HasFactory, TableCache;
    protected $table = 'user_social';

    protected $fillable = [
        'user_id',
        'social_id',
        'service',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
