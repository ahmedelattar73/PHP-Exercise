<?php

namespace Tests\Feature;

use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListCompaniesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A visitor should see all companies list.
     *
     * @return void
     */
    public function test_returns_a_successful_companies_response()
    {
        Company::insert([
            [
                'symbol' => 'AAL',
                'name' => 'American Airlines Group, Inc.',
            ],
            [
                'symbol' => 'AAME',
                'name' => 'Atlantic American Corporation ',
            ]
        ]);

        $response = $this->get('/api/companies');

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'symbol' => 'AAL',
                        'name' => 'American Airlines Group, Inc.',
                    ],
                    [
                        'symbol' => 'AAME',
                        'name' => 'Atlantic American Corporation ',
                    ]
                ]
            ]);
    }
}
