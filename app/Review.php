<?php

namespace App;

use App\Entities\Offer;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable =
        [
            'review_text',
            'rating',
            'offer_id',
        ];

    public function offer()
    {
        return $this->belongsTo(Offer::class,'offer_id');
    }
}
