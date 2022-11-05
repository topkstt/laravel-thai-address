<?php

namespace TopKSTT\ThaiAddress\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostalCodeResource extends JsonResource
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
            'code' => $this->code,
            'sub_district' => new SubDistrictResource($this->whenLoaded('subDistrict')),
            'district' => new DistrictResource($this->whenLoaded('district')),
            'province' => new ProvinceResource($this->whenLoaded('province')),
        ];
    }
}
