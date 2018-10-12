<?php

namespace App\UI\Action;

use Symfony\Component\Routing\Annotation\Route;
use App\UI\Action\Interfaces\LoginActionInterface;
use App\UI\Responder\Interfaces\LoginResponderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


/**
 * Class LoginAction
 * @package App\UI\Action
 */
class LoginAction implements LoginActionInterface
{
    /**
     * @Route("/login", name="login", methods={"GET","POST"})
     */
    public function __invoke(LoginResponderInterface $responder, AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $responder($error, $lastUsername);
    }
}