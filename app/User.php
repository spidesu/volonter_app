<?php

namespace App;

use App\Entities\Offer;
use App\Entities\Tag;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'email', 'password','first_name','last_name','middle_name','phone','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function questionnaire()
    {
        return $this->hasOne(Questionnaire::class, 'user_id');
    }
    public function offers()
    {
        return $this->hasMany(Offer::class, 'users_id');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'target', 'tags_relation');
    }
}
