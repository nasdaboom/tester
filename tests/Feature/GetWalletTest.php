<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use stdClass;

class GetWalletTest extends TestCase
{
    /**
     * A test for get wallet api.
     *
     * @return void
     */
    public function testGetWallet()
    {
        $user = User::whereEmail('user@fortest.com')->first();

        if (!$user) {
            $request = new stdClass();
            $request->name = 'User For Test';
            $request->email = 'user@fortest.com';
            $request->password = Hash::make('qweqwe');
            
            $user = new User();
            $user = $user->register($request);
        }

        $token = $user->createToken('auth_token')->accessToken;

        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])->get('/api/wallet');

        $response->assertStatus(200);
    }
}
