<?php
namespace App\Http\Controllers\User;

use App\Http\Requests\User\RegisterRequest;
use App\UseCase\User\RegisterUseCase;

class RegisterController
{
    public function __invoke(RegisterRequest $request, RegisterUseCase $register): void
    {
        $register->__invoke($request->validated());
    }
}
