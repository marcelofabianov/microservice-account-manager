<?php

namespace Tests\Feature\Accounts\Controllers;

use App\Accounts\Data\Models\Account;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\OAuth;
use Tests\TestCase;
use function env;

/**
 * Test blackbox
 */
class AccountsTest extends TestCase
{
    use RefreshDatabase;
    use OAuth;
    use WithFaker;
    use DatabaseMigrations;

    public function test_list_of_accounts()
    {
        Account::factory()->create();

        $response = $this->get(env('API_URL').'/accounts', $this->getHeadersAuthorization());

        //dd($response->json());

        $response->assertOk();
    }
}
