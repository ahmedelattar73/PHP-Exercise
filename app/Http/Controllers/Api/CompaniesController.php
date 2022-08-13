<?php

namespace App\Http\Controllers\Api;

use App\Bussiness\HistoricalData\Facades\HistoricalDataFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListHistoricalDataRequest;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\HistoricalDataResource;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CompaniesController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function listCompaniesData(): AnonymousResourceCollection
    {
        return CompanyResource::collection(
            app(CompanyRepository::class)->all()
        );
    }

    /**
     * @param ListHistoricalDataRequest $historicalDataRequest
     * @return AnonymousResourceCollection
     */
    public function listHistoricalData(ListHistoricalDataRequest $historicalDataRequest): AnonymousResourceCollection
    {
        $historicalDataCollection = HistoricalDataFacade::processListHistoricalDataRequest(
            $historicalDataRequest->getRequestDataTransfer()
        );

        return HistoricalDataResource::collection($historicalDataCollection);
    }
}
