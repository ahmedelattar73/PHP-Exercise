<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param $request
     * @return array<mixed>
     */
    public function toArray($request): array
    {
        return [
            'id'  => $this->id,
            'symbol'  => $this->symbol,
        ];
    }
}
