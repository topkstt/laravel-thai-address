<?php

namespace TopKSTT\ThaiAddress\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ThaiAddressResource extends JsonResource
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
            'sub_district' => $this->subDistrict->name,
            'district' => $this->district->name,
            'province' => $this->province->name,
            'postal_code' => $this->code,
        ];
    }
}
