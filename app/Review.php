<?php

namespace App;

use App\Entities\Vacancy;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable =
        [
          'review_text',
          'rating',
          'vacancy_id',
        ];

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class,'vacancy_id');
    }
}
