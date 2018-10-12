<?php

namespace App\UI\Action\Interfaces;

use App\UI\Responder\Interfaces\LoginResponderInterface;

interface LoginActionInterface
{
    public function __invoke(LoginResponderInterface $responder);
}