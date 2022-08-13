<?php

namespace App\Http\Controllers\Api;

use App\DTO\HistoricalDataRequestTransfer;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListHistoricalDataRequest;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\HistoricalDataResource;
use App\Repositories\CompanyRepository;
use App\Services\YhFinanceService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CompaniesController extends Controller
{
    /**
     * @var CompanyRepository
     */
    protected CompanyRepository $companyRepository;

    /**
     * @param CompanyRepository $companyRepository
     */
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function list(): AnonymousResourceCollection
    {
        return CompanyResource::collection(
            $this->companyRepository->all()
        );
    }

    /**
     * @param ListHistoricalDataRequest $historicalDataRequest
     * @return AnonymousResourceCollection
     */
    public function listHistoricalData(ListHistoricalDataRequest $historicalDataRequest): AnonymousResourceCollection
    {
        $historicalDataRequestTransfer = new HistoricalDataRequestTransfer(
            $historicalDataRequest->validated()['symbol'],
            $historicalDataRequest->validated()['start_date'],
            $historicalDataRequest->validated()['end_date'],
            $historicalDataRequest->validated()['email']
        );

        $historicalData = app(YhFinanceService::class)->fetch(
            $historicalDataRequestTransfer->getSymbol()
        );

        return HistoricalDataResource::collection($historicalData);
    }
}
