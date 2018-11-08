<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 14:18
 */

namespace App\Controller;



use App\Controller\Interfaces\LoginControllerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class LoginController
 * @package App\Controller
 */
class LoginController extends AbstractController implements LoginControllerInterface
{

    /**
     * @Route("/login", name="login", methods={"GET","POST"})
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login/index.html.twig', [
            'error' => $error,
            'last_username' => $lastUsername
        ]);

    }
}