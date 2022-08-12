<?php

namespace App\Services;

use App\DTO\CompanyTransfer;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class DatahubService
{
    const NASDAQ_LIST_END_POINT = 'https://pkgstore.datahub.io/core/nasdaq-listings/nasdaq-listed_json/data/a5bc7580d6176d60ac0b2142ca8d7df6/nasdaq-listed_json.json';
    const SLEEP_MILLI_SECONDS = 100;
    const RETRY_TIMES = 3;

    /**
     * @return Collection
     * @throws \Exception
     */
    public function fetch(): Collection
    {
        $client = Http::retry(static::RETRY_TIMES, static::SLEEP_MILLI_SECONDS)
                    ->get(static::NASDAQ_LIST_END_POINT);

        if ($client->ok()) {
            return $this->mapToTransfer($client);
        }

        throw new \Exception(trans('messages.errors.datahub_connection_error'));
    }

    /**
     * @param $client
     * @return Collection
     */
    protected function mapToTransfer($client): Collection
    {
        return $client->collect()->map(function ($item) {
            return new CompanyTransfer($item['Symbol']);
        });
    }
}
