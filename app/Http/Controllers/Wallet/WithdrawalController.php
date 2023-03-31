<?php
namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use App\UseCase\Wallet\WithdrawUseCase;
use Exception;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    /**
     * @throws Exception
     */
    public function __invoke(Request $request, WithdrawUseCase $wallet_withdraw)
    {
        //Deposit with amount
        //Deposit with payment method
        $amount = $request->get("amount");
        $method = $request->get("method");
        $wallet_withdraw->__invoke($method, $amount);
    }
}
