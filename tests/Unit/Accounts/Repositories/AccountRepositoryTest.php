<?php

namespace Tests\Unit\Accounts\Repositories;

use App\Accounts\Data\DtoTranslate\AccountDtoTranslate;
use App\Accounts\Data\Enums\AccountStatusEnum;
use App\Accounts\Data\Models\Account;
use App\Accounts\Data\Repositories\AccountRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\OAuth;
use Tests\TestCase;

class AccountRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use OAuth;
    use WithFaker;
    use DatabaseMigrations;

    /**
     * @test
     */
    public function listOfAccounts()
    {
        $account = Account::factory()->create()->toArray();
        $account = AccountDtoTranslate::instance()->translateSourceFromDto($account);

        $expected = (object) [
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

        $repository = new AccountRepository();
        $actual = $repository->accounts()->get();

        $this->assertEquals(collect([$expected]), $actual);
    }

    /**
     * @test
     */
    public function listOfAccountsThatContainStatusParameter()
    {
        $account = Account::factory()->create(['conta_status' => 1])->toArray();
        $account = AccountDtoTranslate::instance()->translateSourceFromDto($account);

        $expected = (object) [
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

        $status = AccountStatusEnum::from(1);

        $repository = new AccountRepository();
        $actual = $repository->accounts($status)->get();

        $this->assertEquals(collect([$expected]), $actual);
    }

    /**
     * @test
     */
    public function findAccountById()
    {
        $account = Account::factory()->create()->toArray();
        $account = AccountDtoTranslate::instance()->translateSourceFromDto($account);

        $repository = new AccountRepository();
        $expected = $repository->find($account->id);

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
