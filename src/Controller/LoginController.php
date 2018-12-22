<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 14:18
 */

namespace App\Controller;

use App\Controller\Interfaces\LoginControllerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;

/**
 * Class LoginController
 * @package App\Controller
 */
class LoginController implements LoginControllerInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * LoginController constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @Route(path="/login", name="login", methods={"GET","POST"})
     * @param AuthenticationUtils $authenticationUtils
     * @return mixed|Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index(AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();


        return new Response($this->twig->render('login/index.html.twig', [
            'error' => $error,
            'last_username' => $lastUsername
        ]), Response::HTTP_OK);

    }
}