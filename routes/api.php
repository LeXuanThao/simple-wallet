<?php

use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\Wallet\DepositController;
use App\Http\Controllers\Wallet\TransferController;
use App\Http\Controllers\Wallet\WithdrawalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/register', RegisterController::class);

Route::middleware('auth')->group(function () {
    //Deposit
    Route::post('/deposit', DepositController::class);
    //Withdraw
    Route::post('/withdrawal', WithdrawalController::class);
    //Transfer
    Route::post('/transfer', TransferController::class);
});
