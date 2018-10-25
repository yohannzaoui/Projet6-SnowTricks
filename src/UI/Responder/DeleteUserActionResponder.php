<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 25/10/2018
 * Time: 15:25
 */

namespace App\UI\Responder;


use App\UI\Responder\Interfaces\DeleteUserActionResponderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Twig\Environment;

class DeleteUserActionResponder implements DeleteUserActionResponderInterface
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke()
    {
        return new RedirectResponse('/allUsers');
    }
}