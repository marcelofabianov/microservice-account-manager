<?php

namespace Tests\Feature\Accounts;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\OAuth;
use Tests\TestCase;

class CreateAccountTest extends TestCase
{
    use RefreshDatabase;
    use OAuth;
    use WithFaker;
    use DatabaseMigrations;

    /**
     * @test
     */
    public function accountRegistrationNotReportingStatus()
    {
        //
    }

    public function accountRegistrationInformingStatus()
    {
        //
    }
}
