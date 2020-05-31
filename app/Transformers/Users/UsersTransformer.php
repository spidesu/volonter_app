<?php

namespace App\Transformers\Users;

use App\Transformers\Offers\OffersTransformer;
use App\Transformers\Offers\OffersTransformerWithoutVacancy;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UsersTransformer extends JsonResource
{
    public function toArray($request)
    {
        $data = array(
            'id' => $this->id,
            'login' => $this->title,
            'email' => $this->description,
            'first_name'=>$this->date_start,
            'last_name'=>$this->date_end,
            //'middle_name' => OffersTransformerWithoutVacancy::collection($this->offers),
            'phone' => $this->user,
            'role_id' => $this->city,
            //'address' => $this->address,
            //'status' => $this->status,
            'tags' => $this->tags,
        );

        return $data;
    }
}
