<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 06/11/2018
 * Time: 16:40
 */

namespace App\Controller;


use App\Controller\Interfaces\ForgotPasswordValidationControllerInterface;
use App\Entity\User;
use App\Form\ForgotPasswordValidationType;
use App\FormHandler\ForgotPasswordValidationTypeHandler;
use App\Repository\UserRepository;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

/**
 * Class ForgotPasswordValidationController
 * @package App\Controller
 */
class ForgotPasswordValidationController implements ForgotPasswordValidationControllerInterface
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var ForgotPasswordValidationTypeHandler
     */
    private $forgotPasswordValidationTypeHandler;

    /**
     * ForgotPasswordValidationController constructor.
     * @param UserRepository $userRepository
     * @param ForgotPasswordValidationTypeHandler $forgotPasswordValidationTypeHandler
     * @param FormFactoryInterface $formFactory
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        UserRepository $userRepository,
        ForgotPasswordValidationTypeHandler $forgotPasswordValidationTypeHandler,
        FormFactoryInterface $formFactory,
        Environment $twig,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->userRepository = $userRepository;
        $this->forgotPasswordValidationTypeHandler = $forgotPasswordValidationTypeHandler;
        $this->formFactory = $formFactory;
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @Route("/forgotPasswordValidation/{token}", name="forgotPasswordValidation", methods={"GET","POST"})
     * @param Request $request
     * @return mixed|RedirectResponse|Response
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index(Request $request)
    {
        if ($this->userRepository->checkResetToken($request->attributes->get('token'))) {

            $user = new User();
            $form = $this->formFactory->create(ForgotPasswordValidationType::class, $user)
                ->handleRequest($request);

            if ($this->forgotPasswordValidationTypeHandler->handle($request->attributes->get('token'), $form)) {

                return new RedirectResponse($this->urlGenerator->generate('login'), 302);
            }
            return new Response($this->twig->render('reset/index.html.twig', [
                'form' => $form->createView()
            ]), 200);

        }
        return new Response($this->twig->render('error/forgot_password_validation_error.html.twig'));
    }

}