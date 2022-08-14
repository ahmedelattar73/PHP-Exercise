<?php

namespace Tests\Feature;

use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListHistoricalDataTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A visitor should see all companies list.
     *
     * @return void
     */
    public function test_returns_a_successful_historical_data_response()
    {
        Company::create([
                'symbol' => 'AAL',
                'name' => 'American Airlines Group, Inc.',
        ]);

        $response = $this->get('/api/historical-data?symbol=AAL&start_date=2022-05-10&end_date=2022-08-10&email=ahmed@gmail.com');

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'date' => true,
                        'open' => true,
                        'high' => true,
                        'low' => true,
                        'close' => true,
                        'volume' => true,
                    ]
                ]
            ]);
    }
}
