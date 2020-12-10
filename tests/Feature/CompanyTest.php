<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_a_company_can_be_created(): void
    {
        $this->withoutExceptionHandling();

        $company_details = [
            'name' => $this->faker->company . ' ' . $this->faker->companySuffix,
            'code' => strtoupper(substr(md5(microtime()), random_int(0,26),5))
        ];

        $response = $this->post(route('companies.store'), $company_details);

        $response->assertRedirect(route('analysis.index', ['code' => $company_details['code']]));
        $this->assertDatabaseHas('companies', $company_details);
    }
}
