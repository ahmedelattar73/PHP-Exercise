<?php

namespace App\Repositories;

use App\DTO\CompanyTransfer;
use App\Models\Company;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Response;

class CompanyRepository
{
    /**
     * @var Model
     */
    protected Model $model;

    public function __construct()
    {
        $this->model = new Company();
    }

    public function all(): Collection
    {
        return $this->mapToTransfer(
            $this->model->all()
        );
    }

    /**
     * @param Collection $response
     * @return Collection
     */
    protected function mapToTransfer(Collection $response): Collection
    {
        return $response->collect()->map(function ($item) {
            return new CompanyTransfer($item->symbol);
        });
    }
}
