<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 25/10/2018
 * Time: 13:55
 */

namespace App\UI\Responder;


use App\UI\Responder\Interfaces\AllUsersActionResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class AllUsersActionResponder implements AllUsersActionResponderInterface
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke($users)
    {
        return new Response($this->twig->render('admin/users.html.twig', [
            'users' => $users
        ]), 200);
    }
}