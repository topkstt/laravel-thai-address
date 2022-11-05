<?php

namespace TopKSTT\ThaiAddress\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProvinceResource extends JsonResource
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
            'districts' => DistrictResource::collection($this->whenLoaded('districts')),
            'postal_codes' => PostalCodeResource::collection($this->whenLoaded('postalCodes')),
        ];
    }
}
