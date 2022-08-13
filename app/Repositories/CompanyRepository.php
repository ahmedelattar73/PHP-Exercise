<?php

namespace App\Repositories;

use App\DTO\CompanyTransfer;
use App\Models\Company;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

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

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->mapToCollectionTransfer(
            $this->model->all()
        );
    }

    /**
     * @param $symbol
     * @return CompanyTransfer
     */
    public function findBySymbol($symbol): CompanyTransfer
    {
        return $this->mapToItemTransfer(
            $this->model->where('symbol', $symbol)->first()
        );
    }

    /**
     * @param Collection $response
     * @return Collection
     */
    protected function mapToCollectionTransfer(Collection $collection): Collection
    {
        return $collection->collect()->map(function ($item) {
            return $this->mapToItemTransfer($item);
        });
    }

    /**
     * @param Company $item
     * @return CompanyTransfer
     */
    protected function mapToItemTransfer(Company $item): CompanyTransfer
    {
        return new CompanyTransfer($item->symbol, $item->name);
    }
}
