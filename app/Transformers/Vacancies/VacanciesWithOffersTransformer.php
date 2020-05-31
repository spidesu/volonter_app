<?php

namespace App\Transformers\Vacancies;

use App\Http\Resources\OfferResource;
use App\Transformers\Offers\OffersTransformer;
use Illuminate\Http\Resources\Json\JsonResource;

class VacanciesWithOffersTransformer extends JsonResource
{
    public function toArray($request)
    {
        $data = array(
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'offers' => OffersTransformer::collection($this->offers)
        );

        return $data;
    }
}
