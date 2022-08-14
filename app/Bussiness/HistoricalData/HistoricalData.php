<?php

namespace App\Bussiness\HistoricalData;

use App\DTO\HistoricalDataRequestTransfer;
use App\Mail\HistoricalDataReport;
use App\Repositories\CompanyRepository;
use App\Services\YhFinanceService;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;

class HistoricalData
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

        $historicalDataCollection = $this->filterDataByDate($historicalDataCollection, $historicalDataRequestTransfer);

        $companyTransfer = app(CompanyRepository::class)
            ->findBySymbol($historicalDataRequestTransfer->getSymbol());

        Mail::to($historicalDataRequestTransfer->getEmail())
            ->send(new HistoricalDataReport(
                $historicalDataRequestTransfer,
                $companyTransfer
            ));

        return $historicalDataCollection;
    }

    /**
     * @param Collection $historicalDataCollection
     * @param HistoricalDataRequestTransfer $historicalDataRequestTransfer
     *
     * @return Collection
     */
    protected function filterDataByDate(Collection $historicalDataCollection, HistoricalDataRequestTransfer $historicalDataRequestTransfer): Collection
    {
        $startDate = Carbon::create($historicalDataRequestTransfer->getStartDate());
        $endDate = Carbon::create($historicalDataRequestTransfer->getEndDate());

        foreach ($historicalDataCollection as $elementKey => $element) {
            if (!empty($element->getDate())) {
                $originalSate = Carbon::createFromTimestamp($element->getDate());
                if ($this->isOutOfDateRange($originalSate, $startDate, $endDate)) {
                    unset($historicalDataCollection[$elementKey]);
                }
            }
        }

        return $historicalDataCollection;
    }

    /**
     * @param Carbon $originalSate
     * @param Carbon $startDate
     * @param Carbon $endDate
     *
     * @return bool
     */
    protected function isOutOfDateRange(Carbon $originalSate, Carbon $startDate, Carbon $endDate): bool
    {
        return $originalSate->gte($endDate) || $originalSate->lte($startDate);
    }
}
