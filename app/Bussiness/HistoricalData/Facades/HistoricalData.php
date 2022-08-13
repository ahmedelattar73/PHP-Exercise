<?php

namespace App\Bussiness\HistoricalData\Facades;

use Illuminate\Support\Facades\Facade;

class HistoricalData extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'historical-data';
    }
}
