<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{

    protected $hidden = [
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
