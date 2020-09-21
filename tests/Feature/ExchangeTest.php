<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use stdClass;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ExchangeTest extends TestCase
{
    /**
     * A test for exchange currencies
     *
     * @return void
     */
    public function testExchange()
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

        $btc = $user->currencies()
            ->whereName('btc')
            ->first();
        
        $btc->pivot->balance = 1;
        $btc->pivot->save();

        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])->post('/api/exchange', [
            'currency' => 'btc',
            'currency_amount' => 1.5,
            'to_currency' => 'ltc'
        ]);

        $response->assertStatus(400);

        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])->post('/api/exchange', [
            'currency' => 'btc',
            'currency_amount' => 0.8,
            'to_currency' => 'ltc'
        ]);

        $response->assertStatus(200);
    }
}
