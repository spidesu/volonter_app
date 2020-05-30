<?php

namespace App\Transformers\Vacancies;

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
        );

        return $data;
    }
}