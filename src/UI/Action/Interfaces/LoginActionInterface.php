<?php

namespace App\UI\Action\Interfaces;

use App\UI\Responder\Interfaces\LoginResponderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Interface LoginActionInterface
 * @package App\UI\Action\Interfaces
 */
interface LoginActionInterface
{
    /**
     * @param LoginResponderInterface $responder
     * @return mixed
     */
    public function __invoke(LoginResponderInterface $responder, AuthenticationUtils $authenticationUtils);
}