<?php

namespace TopKSTT\ThaiAddress\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PostalCodeResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
