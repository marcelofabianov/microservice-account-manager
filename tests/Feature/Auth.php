<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

trait Auth
{
    public function login($id = null, $secret = null)
    {
        Artisan::call('passport:install');

        $client = DB::table('oauth_clients')
            ->select('id', 'secret')
            ->first();

        $data = [
            'grant_type' => 'client_credentials',
            'client_id' => $id ?? $client->id,
            'client_secret' => $secret ?? $client->secret,
        ];
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ];

        return $this->postJson('/oauth/token', $data, $headers);
    }

    public function loginToken()
    {
        $response = $this->login();

        $json = $response->json();
        return $json['token'];
    }
}
