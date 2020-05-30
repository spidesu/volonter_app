<?php

namespace App\Transformers\Tags;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class TagsTransformer extends JsonResource
{
    public function toArray($request)
    {
        $data = array(
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'date_start'=>$this->date_start,
            'date_end'=>$this->date_end,
        );

        return $data;
    }
}
