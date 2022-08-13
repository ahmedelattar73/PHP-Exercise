<?php

namespace App\Bussiness\HistoricalData;

use App\DTO\HistoricalDataRequestTransfer;
use App\Http\Requests\ListHistoricalDataRequest;
use App\Mail\HistoricalDataReport;
use App\Repositories\CompanyRepository;
use App\Services\YhFinanceService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;

class HistoricalDataFacade
{
    /**
     * List Historical data by company.
     * - Call YhFinance service to fetch the data.
     * - Get company data from database.
     * - Send email to the user.
     *
     * @param HistoricalDataRequestTransfer $historicalDataRequestTransfer
     *
     * @return ?Collection
     */
    public function processListHistoricalDataRequest(HistoricalDataRequestTransfer $historicalDataRequestTransfer): ?Collection
    {
        $historicalDataCollection = app(YhFinanceService::class)->fetch(
            $historicalDataRequestTransfer->getSymbol()
        );

        $companyTransfer = app(CompanyRepository::class)
            ->findBySymbol($historicalDataRequestTransfer->getSymbol());

        Mail::to($historicalDataRequestTransfer->getEmail())
            ->send(new HistoricalDataReport(
                $historicalDataRequestTransfer,
                $companyTransfer
            ));

        return $historicalDataCollection;
    }
}
