<?php

namespace App\Http\Resources;

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
            'symbol'  => $this->getSymbol(), // @phpstan-ignore-line
            'name'  => $this->getName(), // @phpstan-ignore-line
        ];
    }
}
