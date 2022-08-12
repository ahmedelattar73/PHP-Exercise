<?php

namespace App\Jobs;

use App\Models\Company;
use App\Services\DatahubService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SyncCompaniesData implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * @return void
     */
    public function handle(): void
    {
        $companiesCollection = app(DatahubService::class)->fetch();

        DB::transaction(function () use ($companiesCollection) {
            Company::query()->delete();
            Company::insert(
                $this->prepareDate($companiesCollection)
            );
        });
    }

    /**
     * @param Collection $companies
     * @return array
     */
    protected function prepareDate(Collection $companiesCollection): array
    {
        $data = [];
        foreach ($companiesCollection as $companyTransfer) {
            $data[] = ['symbol' => $companyTransfer->getSymbol()];
        }

        return $data;
    }
}
