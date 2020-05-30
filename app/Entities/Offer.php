<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'users_id',
        'vacancies_id',
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }
    public function vacancy()
    {
        return $this->hasOne(Vacancy::class, 'id');
    }
}
