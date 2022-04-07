<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    use Auth;

    public function test_authorized_user_trying_to_authenticate()
    {
        $response = $this->login();

        $response->assertOk();
        $response->assertJsonFragment(['token_type' => 'Bearer']);
    }

    public function test_unauthorized_user_trying_to_login()
    {
        $response = $this->login(rand(100, 1000), md5(time()));

        $response->assertStatus(401);
    }
}
