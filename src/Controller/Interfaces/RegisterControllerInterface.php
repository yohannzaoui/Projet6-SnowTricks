<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 17:09
 */

namespace App\Controller\Interfaces;

use App\FormHandler\RegisterFormHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

/**
 * Interfaces RegisterControllerInterface
 * @package App\Controller\Interfaces
 */
interface RegisterControllerInterface
{
    /**
     * RegisterControllerInterface constructor.
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
    );

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request);
}