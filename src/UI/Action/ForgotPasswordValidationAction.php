<?php


namespace App\UI\Action;

use App\Domain\Repository\UserRepository;
use App\UI\Form\Handler\ForgotPasswordValidationTypeHandler;
use App\UI\Responder\ForgotPasswordValidationResponder;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\UI\Form\ForgotPasswordValidationType;
use Symfony\Component\HttpFoundation\Session\Session;
use Twig\Environment;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class ForgotPasswordValidationAction
 * @package App\UI\Action
 */
class ForgotPasswordValidationAction
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;
    /**
     * @var ForgotPasswordValidationTypeHandler
     */
    private $formPasswordValidationTypeHandler;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * ForgotPasswordValidationAction constructor.
     * @param FormFactoryInterface $formFactory
     * @param ForgotPasswordValidationTypeHandler $formPasswordValidationTypeHandler
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        ForgotPasswordValidationTypeHandler $formPasswordValidationTypeHandler,
        UserRepository $userRepository,
        Environment $twig
    ) {
        $this->formFactory = $formFactory;
        $this->formPasswordValidationTypeHandler = $formPasswordValidationTypeHandler;
        $this->userRepository = $userRepository;
        $this->twig = $twig;
    }


    /**
     * @Route("/forgotPasswordValidation/{token}", name="forgotPasswordValidation", methods={"GET","POST"})
     * @param Request $request
     * @param ForgotPasswordValidationResponder $responder
     * @param ForgotPasswordValidationTypeHandler $formPasswordValidationTypeHandler
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(Request $request, ForgotPasswordValidationResponder $responder, ForgotPasswordValidationTypeHandler $formPasswordValidationTypeHandler)
    {

        if($this->userRepository->checkResetToken($request->get('token'))){

            $form = $this->formFactory->create(ForgotPasswordValidationType::class)->handleRequest($request);

            if($this->formPasswordValidationTypeHandler->handle($request->get('token'), $form)){
                return $responder($form);
            }
            return $responder($form);
        }

        return new Response($this->twig->render('error/forgot_password_validation_error.html.twig'));
    }
}