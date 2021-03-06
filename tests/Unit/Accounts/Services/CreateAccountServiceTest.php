<?php

namespace Tests\Unit\Accounts\Services;

use App\Accounts\Business\DefaultAccountStatusBusiness;
use App\Accounts\Data\Enums\AccountStatusEnum;
use App\Accounts\Services\CreateAccountService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateAccountServiceTest extends TestCase
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
            'document' => '2345234533453',
            'name' => "H2O",
            'email' => "contact@h20.com",
            'phone' => "(73) 5734-1084",
            'address' => "455 Arely Bypass",
            'addressNumber' => "432",
            'addressComplement' => "Apt. 899"
        ];

        $service = new CreateAccountService();
        $service->setData($data);
        $reality = $service->execute();

        $expected = $data;

        $expected['id'] = 1;
        $expected['status'] = (DefaultAccountStatusBusiness::get())->value;
        $expected['createdAt'] = $reality['createdAt'];
        $expected['updatedAt'] = $reality['updatedAt'];

        $this->assertEquals($expected, $reality);
    }

    /**
     * @test
     */
    public function accountRegistrationInformingStatus()
    {
        $data = [
            'document' => '2345234533453',
            'name' => "H2O",
            'email' => "contact@h20.com",
            'phone' => "(73) 5734-1084",
            'address' => "455 Arely Bypass",
            'addressNumber' => "432",
            'addressComplement' => "Apt. 899",
            'status' => AccountStatusEnum::CLIENT_ACTIVE->value
        ];

        $service = new CreateAccountService();
        $service->setData($data);
        $reality = $service->execute();

        $expected = $data;

        $expected['id'] = 1;
        $expected['status'] = AccountStatusEnum::CLIENT_ACTIVE->value;
        $expected['createdAt'] = $reality['createdAt'];
        $expected['updatedAt'] = $reality['updatedAt'];

        $this->assertEquals($expected, $reality);
    }
}
