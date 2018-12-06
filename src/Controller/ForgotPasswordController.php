<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 14:41
 */

namespace App\Controller;


use App\Controller\Interfaces\ForgotPasswordControllerInterface;
use App\Form\ForgotPasswordType;
use App\FormHandler\ForgotPasswordHandler;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

/**
 * Class ForgotPasswordController
 * @package App\Controller
 */
class ForgotPasswordController implements ForgotPasswordControllerInterface
{
    /**
     * @var ForgotPasswordHandler
     */
    private $forgotPasswordHandler;

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
     * ForgotPasswordController constructor.
     * @param ForgotPasswordHandler $forgotPasswordHandler
     * @param FormFactoryInterface $formFactory
     * @param UrlGeneratorInterface $urlGenerator
     * @param Environment $twig
     */
    public function __construct(
        ForgotPasswordHandler $forgotPasswordHandler,
        FormFactoryInterface $formFactory,
        UrlGeneratorInterface $urlGenerator,
        Environment $twig
    ) {
        $this->forgotPasswordHandler = $forgotPasswordHandler;
        $this->formFactory = $formFactory;
        $this->urlGenerator = $urlGenerator;
        $this->twig = $twig;
    }


    /**
     * @Route("/forgot", name="forgot", methods={"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function index(Request $request)
    {

        $form = $this->formFactory->create(ForgotPasswordType::class)
            ->handleRequest($request);

        if ($this->forgotPasswordHandler->handle($form)) {

            return new RedirectResponse($this->urlGenerator->generate('forgot'), 302);
        }
        return new Response($this->twig->render('forgot/index.html.twig', [
            'form' => $form->createView()
        ]), 200);
    }
}