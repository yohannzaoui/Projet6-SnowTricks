<?php

namespace App\UI\Action\Interfaces;

use App\UI\Responder\Interfaces\ConfirmeRegisterActionResponderInterface;

interface ConfirmeRegisterActionInterface
{
    public function __invoke(Request $request, ConfirmeRegisterActionResponderInterface $responder);
}