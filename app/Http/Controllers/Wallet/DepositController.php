<?php
namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use App\UseCase\Wallet\DepositUseCase;
use Exception;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    /**
     * @throws Exception
     */
    public function __invoke(Request $request, DepositUseCase $wallet_deposit)
    {
        //Deposit with amount
        //Deposit with payment method
        $amount = $request->get("amount");
        $method = $request->get("method");
        $wallet_deposit->__invoke($method, $amount);
    }
}
