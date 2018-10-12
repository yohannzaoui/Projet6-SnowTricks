<?php

namespace App\UI\Action;

use Symfony\Component\Routing\Annotation\Route;
use App\UI\Action\Interfaces\LoginActionInterface;
use App\UI\Responder\Interfaces\LoginResponderInterface;


class LoginAction implements LoginActionInterface
{
    /**
     * @Route("/connexion", name="login", methods={"GET","POST"})
     */
    public function __invoke(LoginResponderInterface $responder)
    {
        return $responder();
    }
}