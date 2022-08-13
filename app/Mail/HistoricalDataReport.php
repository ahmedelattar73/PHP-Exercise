<?php

namespace App\Mail;

use App\DTO\CompanyTransfer;
use App\DTO\HistoricalDataRequestTransfer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HistoricalDataReport extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    /**
     * @var HistoricalDataRequestTransfer
     */
    public HistoricalDataRequestTransfer $historicalDataRequestTransfer;

    /**
     * @var CompanyTransfer
     */
    public CompanyTransfer $companyTransfer;

    /**
     * @param HistoricalDataRequestTransfer $historicalDataRequestTransfer
     * @param CompanyTransfer $companyTransfer
     */
    public function __construct(HistoricalDataRequestTransfer $historicalDataRequestTransfer, CompanyTransfer $companyTransfer)
    {
        $this->historicalDataRequestTransfer = $historicalDataRequestTransfer;
        $this->companyTransfer = $companyTransfer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.historical_report')
            ->subject('Company’s Name = ' . $this->companyTransfer->getName());
    }
}
