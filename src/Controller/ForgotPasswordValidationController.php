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
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ForgotPasswordValidationController
 * @package App\Controller
 */
class ForgotPasswordValidationController extends AbstractController implements ForgotPasswordValidationControllerInterface
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var ForgotPasswordValidationTypeHandler
     */
    private $forgotPasswordValidationTypeHandler;

    /**
     * ForgotPasswordValidationController constructor.
     * @param UserRepository $userRepository
     * @param ForgotPasswordValidationTypeHandler $forgotPasswordValidationTypeHandler
     */
    public function __construct(
        UserRepository $userRepository,
        ForgotPasswordValidationTypeHandler $forgotPasswordValidationTypeHandler
    ) {
        $this->userRepository = $userRepository;
        $this->forgotPasswordValidationTypeHandler = $forgotPasswordValidationTypeHandler;
    }


    /**
     * @Route("/forgotPasswordValidation/{token}", name="forgotPasswordValidation", methods={"GET","POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function index(Request $request)
    {
        if ($this->userRepository->checkResetToken($request->attributes->get('token'))) {

            $user = new User();
            $form = $this->createForm(ForgotPasswordValidationType::class, $user)
                ->handleRequest($request);

            if ($this->forgotPasswordValidationTypeHandler->handle($request->attributes->get('token'), $form)) {

                return $this->redirectToRoute('login');
            }
            return $this->render('reset/index.html.twig', [
                'form' => $form->createView()
            ]);
        }
        return $this->render('error/forgot_password_validation_error.html.twig');
    }

}