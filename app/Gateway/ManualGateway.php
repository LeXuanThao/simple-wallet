<?php
namespace App\Gateway;

use App\Models\Wallet;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManualGateway implements IGateway
{
    public function deposit($amount)
    {
        return DB::transaction(function () use ($amount) {
            $wallet = Wallet::where('user_id', Auth::id())->lockForUpdate()->first();
            $wallet->update(['balance' => $wallet->balance + $amount]);
        });
    }

    public function withdrawal($amount)
    {
        return DB::transaction(function () use ($amount) {
            $wallet = Wallet::where('user_id', Auth::id())->lockForUpdate()->first();
            if ($wallet->balance >= $amount) {
                $wallet->update(['balance' => $wallet->balance - $amount]);
                return;
            }
            throw new Exception("Out of money");
        });
    }

}
