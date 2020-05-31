<?php

namespace App\Transformers\Vacancies;

use App\Transformers\Offers\OffersTransformer;
use App\Transformers\Offers\OffersTransformerWithoutVacancy;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class VacanciesTransformer extends JsonResource
{
    public function toArray($request)
    {
        $data = array(
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'date_start'=>$this->date_start,
            'date_end'=>$this->date_end,
            'offers' => OffersTransformerWithoutVacancy::collection($this->offers),
            'user' => $this->user,
            'city' => $this->city,
            'address' => $this->address,
            'status' => $this->status,
        );

        return $data;
    }
}
