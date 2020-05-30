<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'displayName' => $this->display_name,
            'email' => $this->email,
            'role' => $this->role,
            'urlAvatar' => $this->url_avatar,
            'createdAt' => $this->created_at,
        ];
    }
}
