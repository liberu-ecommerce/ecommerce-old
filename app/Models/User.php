<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Cashier\Billable;
use LaravelLiberu\Avatars\Models\Avatar;
use LaravelLiberu\Tables\Traits\TableCache;
use LaravelLiberu\Users\Models\User as CoreUser;

class User extends CoreUser
{
    use Billable, CanResetPassword, HasFactory, TableCache;
    protected $fillable = [
        'name',
        'email',
        'password',
        'person_id',
        'group_id',
        'role_id',
        'is_active',
    ];

    public function socials(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserSocial::class, 'user_id', 'id');
    }

    public function avatar(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Avatar::class, 'user_id', 'id');
    }

    public function getNameAttribute()
    {
        return $this->person?->name;
    }

    public function hasSocialLinked($service): bool
    {
        return (bool) $this->socials->where('service', $service)->count();
    }

    //models not created yet
    //TODO: create the various models before uncommenting this code
    /*public function messages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function convOne(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Conversation::class, 'user_one');
    }

    public function convTwo(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Conversation::class, 'user_two');
    }

    public function conversations()
    {
        return $this->convOne->merage($this->convTwo);
    }*/

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
//    public function avatar()
//    {
//        return $this->hasOne(\Avatar::class);
//    }

//    private function getIdAttribute($value='')
//    {
//       $this->id=1;
//    }
}
