<?php

namespace App\UI\Action\Interfaces;

use Symfony\Component\HttpFoundation\Request;
use App\UI\Responder\Interfaces\ConfirmeRegisterActionResponderInterface;

/**
 * Interface ConfirmeRegisterActionInterface
 * @package App\UI\Action\Interfaces
 */
interface ConfirmeRegisterActionInterface
{
    /**
     * @param Request $request
     * @param ConfirmeRegisterActionResponderInterface $responder
     * @return mixed
     */
    public function __invoke(Request $request, ConfirmeRegisterActionResponderInterface $responder);
}