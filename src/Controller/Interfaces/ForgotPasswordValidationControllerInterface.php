<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 16:56
 */

namespace App\Controller\Interfaces;

use App\Repository\UserRepository;
use App\FormHandler\ForgotPasswordValidationTypeHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

/**
 * Interfaces ForgotPasswordValidationInterface
 * @package App\Controller\Interfaces
 */
interface ForgotPasswordValidationControllerInterface
{
    /**
     * ForgotPasswordValidationControllerInterface constructor.
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
    );

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request);
}