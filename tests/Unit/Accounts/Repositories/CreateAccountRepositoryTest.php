<?php

namespace Tests\Unit\Accounts\Repositories;

use App\Accounts\Business\DefaultAccountStatusBusiness;
use App\Accounts\Data\Dto\AccountDto;
use App\Accounts\Data\Enums\AccountStatusEnum;
use App\Accounts\Data\Repositories\CreateAccountRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateAccountRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    use DatabaseMigrations;

    /**
     * @test
     */
    public function accountRegistrationNotReportingStatus()
    {
        $data = [
            'document' => (string) rand(111111111111111, 211111111111111),
            'name' => $this->faker->company,
            'email' => $this->faker->companyEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->streetAddress,
            'addressNumber' => (string) rand(111, 222),
            'addressComplement' => $this->faker->sentence,
            'createdAt' => now(),
            'updatedAt' => now(),
        ];

        $data['status'] = DefaultAccountStatusBusiness::get();

        $dto = AccountDto::from($data);

        $repository = new CreateAccountRepository();

        $actual = $repository->save($dto);

        $expected = $data;
        $expected['createdAt'] = $expected['createdAt']->format('Y-m-d H:i:s');
        $expected['updatedAt'] = $expected['updatedAt']->format('Y-m-d H:i:s');
        $expected['id'] = 1;
        $expected['status'] = DefaultAccountStatusBusiness::get()->value;

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function accountRegistrationInformingStatus()
    {
        $data = [
            'document' => (string) rand(111111111111111, 211111111111111),
            'name' => $this->faker->company,
            'email' => $this->faker->companyEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->streetAddress,
            'addressNumber' => (string) rand(111, 222),
            'addressComplement' => $this->faker->sentence,
            'createdAt' => now(),
            'updatedAt' => now(),
        ];

        $data['status'] = AccountStatusEnum::CLIENT_ACTIVE;

        $dto = AccountDto::from($data);

        $repository = new CreateAccountRepository();

        $actual = $repository->save($dto);

        $expected = $data;
        $expected['createdAt'] = $expected['createdAt']->format('Y-m-d H:i:s');
        $expected['updatedAt'] = $expected['updatedAt']->format('Y-m-d H:i:s');
        $expected['id'] = 1;
        $expected['status'] = AccountStatusEnum::CLIENT_ACTIVE->value;

        $this->assertEquals($expected, $actual);
    }
}
