<?php

namespace App\Entities;

use App\Review;
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
        'result'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id','users_id');
    }
    public function vacancy()
    {
        return $this->hasOne(Vacancy::class, 'id', 'vacancies_id');
    }

    public function review()
    {
        return $this->hasOne(Offer::class, 'offer_id', 'id');
    }
}
