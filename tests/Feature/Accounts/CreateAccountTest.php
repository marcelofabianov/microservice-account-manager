<?php

namespace Tests\Feature\Accounts;

use App\Accounts\Data\Models\Account;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Feature\Auth;
use Tests\TestCase;

class CreateAccountTest extends TestCase
{
    use RefreshDatabase;
    use Auth;
    use WithFaker;
    use DatabaseMigrations;

    public function test_account_registration()
    {
        Account::factory()->create();

        $response = $this->get(env('API_URL').'/accounts', $this->getHeadersAuthorization());

        $response->assertOk();
    }
}
