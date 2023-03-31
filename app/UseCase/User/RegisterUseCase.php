<?php
namespace App\UseCase\User;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;

class RegisterUseCase
{
    public function __invoke($params): void
    {
        assert($params['name']);
        assert($params['email']);
        assert($params['password']);
        $user = User::create([
            'name' => $params['name'],
            'email' => $params['email'],
            'password' => Hash::make($params['password'])
        ]);
        Wallet::create([
            'user_id' => $user->id,
            'balance' => 0
        ]);
    }
}
