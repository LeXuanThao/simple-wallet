<?php
namespace App\UseCase\Wallet;

use App\Gateway\GatewayManager;
use Exception;

class DepositUseCase
{
    public function __construct(protected GatewayManager $gateway_manager) {}

    /**
     * @throws Exception
     */
    public function __invoke(string $method, string $amount): void
    {
        $gateway = $this->gateway_manager->get($method);
        $gateway->deposit($amount);
    }
}
