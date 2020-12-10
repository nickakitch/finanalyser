<?php

namespace Tests\Feature;

use App\Models\FinancialStatement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FinancialStatementTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_a_financial_statement_can_be_created(): void
    {
        $response = $this->post(route('financial_statements.store'), [
            'revenue' => $this->faker->randomNumber(6),
            ''
        ]);
    }

    public function test_a_financial_statement_is_related_to_a_company(): void
    {
        $financial_statement = FinancialStatement::factory()->create();

        self::assertNotNull($financial_statement->company());
    }
}
