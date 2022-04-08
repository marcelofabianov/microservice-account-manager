<?php

namespace Tests\Unit\Accounts\Services;

use App\Accounts\Business\DefaultAccountStatusBusiness;
use App\Accounts\Services\CreateAccountService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\OAuth;
use Tests\TestCase;

class CreateAccountServiceTest extends TestCase
{
    use RefreshDatabase;
    use OAuth;
    use WithFaker;
    use DatabaseMigrations;

    /**
     * @test
     */
    public function createAccount()
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

        $expected['id'] = $reality['id'];
        $expected['status'] = (DefaultAccountStatusBusiness::get())->value;
        $expected['createdAt'] = $reality['createdAt'];
        $expected['updatedAt'] = $reality['updatedAt'];

        $this->assertEquals($expected, $reality);
    }
}
