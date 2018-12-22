<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 13:35
 */

namespace App\Controller;


use App\Controller\Interfaces\RegisterControllerInterface;
use App\Form\RegisterType;
use App\FormHandler\RegisterFormHandler;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;


/**
 * Class RegisterController
 * @package App\Controller
 */
class RegisterController implements RegisterControllerInterface
{
    /**
     * @var RegisterFormHandler
     */
    private $registerFormHandler;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * RegisterController constructor.
     * @param RegisterFormHandler $registerFormHandler
     * @param FormFactoryInterface $formFactory
     * @param UrlGeneratorInterface $urlGenerator
     * @param Environment $twig
     */
    public function __construct(
        RegisterFormHandler $registerFormHandler,
        FormFactoryInterface $formFactory,
        UrlGeneratorInterface $urlGenerator,
        Environment $twig
    ) {
        $this->registerFormHandler = $registerFormHandler;
        $this->formFactory = $formFactory;
        $this->urlGenerator = $urlGenerator;
        $this->twig = $twig;
    }

    /**
     * @Route(path="/register", name="register", methods={"GET","POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $form = $this->formFactory->create(RegisterType::class)
            ->handleRequest($request);

        if ($this->registerFormHandler->handle($form)) {

           return new RedirectResponse($this->urlGenerator->generate('register'),
               RedirectResponse::HTTP_FOUND);
        }
        return new Response($this->twig->render('register/index.html.twig', [
            'form' => $form->createView()
        ]), Response::HTTP_OK);
    }
}