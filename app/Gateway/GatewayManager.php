<?php
namespace App\Gateway;

use Exception;
use Illuminate\Support\Facades\File;

class GatewayManager {

    const SUPPORTED = [
        'manual' => ManualGateway::class
    ];

    /**
     * @return IGateway $gateway
     * @throws Exception
     */
    public function get($method): IGateway
    {
        $class = self::SUPPORTED[$method];
        if (!$class) {
            throw new Exception('Gateway not supported.');
        }
        return app()->make($class);
    }
}
