<?php

namespace Tests\Unit\Accounts\Repositories;

use App\Accounts\Data\Dto\AccountDto;
use App\Accounts\Data\DtoTranslate\AccountDtoTranslate;
use App\Accounts\Data\Models\Account;
use App\Accounts\Data\Repositories\AccountRepository;
use Tests\TestCase;

class AccountRepositoryTest extends TestCase
{
    /**
     * @test
     */
    public function listOfAccounts()
    {
        $account = Account::factory()->create()->toArray();
        $account = AccountDtoTranslate::instance()->translateSourceFromDto($account);

        $repository = new AccountRepository();
        $repository = $repository->accounts()->get();
        $expected = $repository->first();

        $actual = (object) [
            'id' => $account->id,
            'createdAt' => $account->createdAt->format('Y-m-d H:i:s'),
            'updatedAt' => $account->updatedAt->format('Y-m-d H:i:s'),
            'document' => $account->document,
            'name' => $account->name,
            'email' => $account->email,
            'phone' => $account->phone,
            'status' => $account->status->value,
            'address' => $account->address,
            'addressNumber' => $account->addressNumber,
            'addressComplement' => $account->addressComplement,
        ];

        $this->assertEquals($expected, $actual);
    }
}
