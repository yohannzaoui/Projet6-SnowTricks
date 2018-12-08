<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 17:06
 */

namespace App\Controller\Interfaces;

use App\FormHandler\ProfileTypeHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

/**
 * Interfaces ProfileControllerInterface
 * @package App\Controller\Interfaces
 */
interface ProfileControllerInterface
{
    /**
     * ProfileControllerInterface constructor.
     * @param ProfileTypeHandler $profileTypeHandler
     * @param FormFactoryInterface $formFactory
     * @param TokenStorageInterface $tokenStorage
     * @param UrlGeneratorInterface $urlGenerator
     * @param Environment $twig
     */
    public function __construct(
        ProfileTypeHandler $profileTypeHandler,
        FormFactoryInterface $formFactory,
        TokenStorageInterface $tokenStorage,
        UrlGeneratorInterface $urlGenerator,
        Environment $twig
    );

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request);
}