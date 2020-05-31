<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $table = 'vacancies';
    protected $fillable = [
        'title',
        'description',
        'date_start',
        'date_end',
    ];

    public function offers()
    {
        return $this->hasMany(Offer::class, 'vacancies_id');
    }
}
