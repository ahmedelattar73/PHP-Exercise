<?php

namespace App\Bussiness\HistoricalData\Facades;

use Illuminate\Support\Facades\Facade;

class HistoricalDataFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'historical-data';
    }
}
