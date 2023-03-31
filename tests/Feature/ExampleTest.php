<?php

namespace Tests\Feature;

 use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
//    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_create_user() {
        $response = $this->post('/api/register', [
            'name' => 'ThaoLX',
            'email' => 'thaolx@gmail.com',
            'password' => '123456'
        ]);
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'email' => 'thaolx@gmail.com'
        ]);
        $this->assertDatabaseHas('wallets', [
            'user_id' => 1
        ]);
    }

    public function test_deposit_with_method_not_supported() {
        $user = \App\Models\User::find(1);
        $response = $this->actingAs($user)->post('/api/deposit', [
            'method' => 'test',
            'amount' => 10000
        ]);
        $response->assertStatus(500);
    }

    public function test_deposit() {
        $user = \App\Models\User::find(1);
        $response = $this->actingAs($user)->post('/api/deposit', [
            'method' => 'manual',
            'amount' => 10000
        ]);
        $response->assertStatus(200);
        $this->assertDatabaseHas('wallets', [
            'user_id' => 1,
            'balance' => 10000
        ]);
    }

    public function test_withdrawal_out_of_money() {
        $user = \App\Models\User::find(1);
        $response = $this->actingAs($user)->post('/api/withdrawal', [
            'method' => 'manual',
            'amount' => 1000000
        ]);
        $response->assertStatus(500);
    }

    public function test_withdraw() {
        $user = \App\Models\User::find(1);
        $response = $this->actingAs($user)->post('/api/withdrawal', [
            'method' => 'manual',
            'amount' => 10000
        ]);
        $response->assertStatus(200);
        $this->assertDatabaseHas('wallets', [
            'user_id' => 1,
            'balance' => 0
        ]);
    }
}
