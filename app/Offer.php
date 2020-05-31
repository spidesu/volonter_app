<?php

namespace App;

use App\Entities\Vacancy;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable =
        [
            'title',
            'description',
            'vacancy_id',
            'result'
        ];

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class,'vacancy_id');
    }
}
