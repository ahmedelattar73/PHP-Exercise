<?php

namespace App\Services;

use App\DTO\HistoricalDataTransfer;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class YhFinanceService
{
    const GET_HISTORICAL_DATA = 'https://yh-finance.p.rapidapi.com/stock/v3/get-historical-data';
    const SLEEP_MILLI_SECONDS = 100;
    const RETRY_TIMES = 3;

    /**
     * @param string $symbol
     * @return ?Collection
     */
    public function fetch(string $symbol): ?Collection
    {
        $response = $this->httpCall($symbol);

        if ($response->ok()) {
            return $this->mapToTransfer($response->offsetGet('prices'), $symbol);
        }

        return null;
    }

    /**
     * @param string $symbol
     * @return Response
     */
    protected function httpCall(string $symbol): Response
    {
        return Http::withHeaders([
            'X-RapidAPI-Key' => config('services.yh_finance.x_rapid_api_key'),
            'X-RapidAPI-Host' => 'yh-finance.p.rapidapi.com'
        ])->retry(
            static::RETRY_TIMES,
            static::SLEEP_MILLI_SECONDS
        )->get(static::GET_HISTORICAL_DATA, [
            'symbol' => $symbol,
        ]);
    }

    /**
     * @param array<mixed> $response
     * @param string $symbol
     * @return Collection
     */
    protected function mapToTransfer(array $response, string $symbol): Collection
    {
        return collect($response)->map(function ($item) use ($symbol) {
            return new HistoricalDataTransfer(
                $symbol,
                $item['date'] ?? null,
                $item['open'] ?? null,
                $item['high'] ?? null,
                $item['low'] ?? null,
                $item['close'] ?? null,
                $item['volume'] ?? null,
            );
        });
    }
}
