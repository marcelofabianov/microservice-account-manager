<?php

namespace Tests\Feature\Accounts;

use App\Accounts\Data\DtoTranslate\AccountDtoTranslate;
use App\Accounts\Data\Models\Account;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use ReflectionException;
use Tests\Feature\OAuth;
use Tests\TestCase;
use Throwable;
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

    /**
     * @throws ReflectionException
     * @throws Throwable
     */
    public function test_list_of_accounts_that_contain_paginate()
    {
        $account = Account::factory()->create();
        $account = AccountDtoTranslate::instance()->translateSourceFromDto($account->toArray());

        $received = $this->get(env('API_URL') . '/accounts', $this->getHeadersAuthorization());

        $expected = [
            'type' => 'Accounts',
            'data' => [
                [
                    'id' => $account->id,
                    'name' => $account->name,
                    'document' => $account->document,
                    'status' => $account->status->value,
                    'email' => $account->email,
                    'phone' => $account->phone,
                    'address' => $account->address,
                    'addressNumber' => $account->addressNumber,
                    'addressComplement' => $account->addressComplement,
                    'createdAt' => $account->createdAt->toIso8601String(),
                    'updatedAt' => $account->updatedAt->toIso8601String(),
                ]
            ],
            'links' => [
                'first' => route('api.accounts.index').'?page=1',
                'last' => null,
                'prev' => null,
                'next' => route('api.accounts.index').'?page=2',
            ],
            'meta' => [
                'current_page' => 1,
                'from' => 1,
                'path' => route('api.accounts.index'),
                'per_page' => null,
                'to' => 1
            ]
        ];

        $received->assertOk();

        $this->assertEquals($expected, $received->json());
    }

    public function test_list_of_accounts_that_contain_status_parameter()
    {
        //
    }

    public function test_list_of_accounts_that_contain_relationship_parameter()
    {
        //
    }

    public function test_list_of_accounts_that_contain_links_parameter()
    {
        //
    }

    public function test_list_of_accounts_that_contain_all_parameters()
    {
        //
    }
}
