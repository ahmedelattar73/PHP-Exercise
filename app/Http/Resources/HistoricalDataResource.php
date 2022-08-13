<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HistoricalDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'date'  => $this->getDate(),
            'open'  => $this->getOpen(),
            'high'  => $this->getHigh(),
            'low'  => $this->getLow(),
            'close'  => $this->getClose(),
            'volume'  => $this->getVolume(),
        ];
    }
}
