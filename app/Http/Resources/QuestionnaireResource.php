<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionnaireResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type_id' => $this->type_id,
            'birth_date' => $this->birth_date,
            'experience' => $this->experience,
            'about' => $this->about,
            'experience_about' => $this->experience_about,
            'city' => $this->city
        ];
    }
}
