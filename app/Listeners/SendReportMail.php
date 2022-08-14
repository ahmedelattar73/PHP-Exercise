<?php

namespace App\Listeners;

use App\Events\SearchedHistoricalData;
use App\Mail\HistoricalDataReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendReportMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SearchedHistoricalData  $event
     * @return void
     */
    public function handle(SearchedHistoricalData $event)
    {
        Mail::to($event->historicalDataRequestTransfer->getEmail())
            ->send(new HistoricalDataReport(
                $event->historicalDataRequestTransfer,
                $event->companyTransfer
            ));
    }
}
