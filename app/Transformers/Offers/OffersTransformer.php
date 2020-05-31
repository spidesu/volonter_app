<?php

namespace App\Transformers\Offers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class OffersTransformer extends JsonResource
{
    public function toArray($request)
    {
        $data = array(
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'user' => $this->user,
            'vacancy' => $this->vacancy,
            'result' => $this->result
        );

        return $data;
    }
}
