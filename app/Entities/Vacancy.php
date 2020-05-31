<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $table = 'vacancies';
    protected $fillable = [
        'title',
        'description',
        'date_start',
        'date_end',
        'city',
        'address',
        'user_id',
        'status'
    ];

    public function offers()
    {
        return $this->hasMany(Offer::class, 'vacancies_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
