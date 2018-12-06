<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 16:49
 */

namespace App\Controller\Interfaces;

use App\FormHandler\ForgotPasswordHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

/**
 * Interfaces ForgotPasswordControllerInterface
 * @package App\Controller\Interfaces
 */
interface ForgotPasswordControllerInterface
{
    /**
     * ForgotPasswordControllerInterface constructor.
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
    );

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request);
}