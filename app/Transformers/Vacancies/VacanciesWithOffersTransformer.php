<?php

namespace App\Transformers\Vacancies;

use App\Http\Resources\OfferResource;
use Illuminate\Http\Resources\Json\JsonResource;

class VacanciesWithOffersTransformer extends JsonResource
{
    public function toArray($request)
    {
        $data = array(
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'offers' => OfferResource::collection($this->offers)
        );

        return $data;
    }
}
