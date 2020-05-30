<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $table = 'vacancies';
    protected $fillable = [
        'title',
        'description',
    ];
}
