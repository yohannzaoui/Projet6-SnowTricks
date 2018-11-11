<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 13:35
 */

namespace App\Controller;


use App\Controller\Interfaces\RegisterControllerInterface;
use App\Form\RegisterType\RegisterType;
use App\FormHandler\RegisterFormHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class RegisterController
 * @package App\Controller
 */
final class RegisterController extends AbstractController implements RegisterControllerInterface
{
    /**
     * @var RegisterFormHandler
     */
    private $registerFormHandler;

    /**
     * RegisterController constructor.
     * @param RegisterFormHandler $registerFormHandler
     */
    public function __construct(RegisterFormHandler $registerFormHandler)
    {
        $this->registerFormHandler = $registerFormHandler;
    }

    /**
     * @Route("/register", name="register", methods={"GET","POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $form = $this->createForm(RegisterType::class)
            ->handleRequest($request);

        if ($this->registerFormHandler->handle($form)) {

           return $this->redirectToRoute('register');
        }
        return $this->render('register/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}