<?php

namespace TopKSTT\ThaiAddress\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubDistrictResource extends JsonResource
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
            'name' => $this->name,
            'district' => new DistrictResource($this->whenLoaded('district')),
            'postal_code' => new PostalCodeResource($this->whenLoaded('postalCode')),
        ];
    }
}
