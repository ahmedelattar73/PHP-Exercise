<?php

namespace App\Events;

use App\DTO\CompanyTransfer;
use App\DTO\HistoricalDataRequestTransfer;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SearchedHistoricalData
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var HistoricalDataRequestTransfer
     */
    public HistoricalDataRequestTransfer $historicalDataRequestTransfer;

    /**
     * @var CompanyTransfer
     */

    public CompanyTransfer $companyTransfer;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(HistoricalDataRequestTransfer $historicalDataRequestTransfer, CompanyTransfer $companyTransfer)
    {
        $this->historicalDataRequestTransfer = $historicalDataRequestTransfer;
        $this->companyTransfer = $companyTransfer;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
