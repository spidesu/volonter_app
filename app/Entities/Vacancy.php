<?php

namespace App\Entities;

use App\Offer;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $table = 'vacancies';
    protected $fillable = [
        'title',
        'description',
    ];

    public function offers()
    {
        return $this->hasMany(Offer::class,'vacancy_id');
    }
}
