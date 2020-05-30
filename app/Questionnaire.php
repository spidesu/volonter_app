<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{

    protected $hidden = [
    ];

    protected $fillable = [
        'user_id',
        'type_id',
        'birth_date',
        'experience',
        'about',
        'experience_about',
        'city'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
