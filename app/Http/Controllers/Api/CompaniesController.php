<?php

namespace App\Http\Controllers\Api;

use App\Bussiness\HistoricalData\Facades\HistoricalData;
use App\DTO\HistoricalDataRequestTransfer;
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
    public function list(): AnonymousResourceCollection
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
        $historicalDataRequestTransfer = new HistoricalDataRequestTransfer(
            $historicalDataRequest->input('symbol'),
            $historicalDataRequest->input('start_date'),
            $historicalDataRequest->input('end_date'),
            $historicalDataRequest->input('email')
        );

        $historicalDataCollection = HistoricalData::processHistoricalDataRequest($historicalDataRequestTransfer);

        return HistoricalDataResource::collection($historicalDataCollection);
    }
}
