<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAuth()
    {
        $email = $this->faker->email;

        $register = $this->postJson('/api/register', [
            'name' => $this->faker->name,
            'email' => $email,
            'password' => 'qweqwe'
        ]);

        $register->assertStatus(201);

        $login = $this->postJson('/api/login', [
            'email' => $email,
            'password' => 'qweqwe'
        ]);

        $login->assertStatus(200);
    }
}
