<?php

namespace Tests\Feature\Accounts;

use App\Accounts\Data\DtoTranslate\AccountDtoTranslate;
use App\Accounts\Data\Models\Account;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\OAuth;
use Tests\TestCase;

class FindAccountTest extends TestCase
{
    use RefreshDatabase;
    use OAuth;
    use WithFaker;
    use DatabaseMigrations;

    /**
     * @test
     */
    public function findAccountById()
    {
        $account = Account::factory()->create();
        $account = AccountDtoTranslate::instance()->translateSourceFromDto($account->toArray());

        $received = $this->get(env('API_URL') . '/accounts/'.$account->id, $this->getHeadersAuthorization());

        $expected = [
            'account' => [
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
        ];

        $received->assertOk();

        $this->assertEquals($expected, $received->json());
    }
}
