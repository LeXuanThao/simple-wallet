<?php
namespace App\Gateway;

interface IGateway
{
    public function deposit($amount);
    public function withdrawal($amount);

}
