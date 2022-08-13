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
    public function toArray($request): array
    {
        return [
            'date'  => $this->getDate(), // @phpstan-ignore-line
            'open'  => $this->getOpen(), // @phpstan-ignore-line
            'high'  => $this->getHigh(), // @phpstan-ignore-line
            'low'  => $this->getLow(), // @phpstan-ignore-line
            'close'  => $this->getClose(), // @phpstan-ignore-line
            'volume'  => $this->getVolume(), // @phpstan-ignore-line
        ];
    }
}
