<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 17:06
 */

namespace App\Controller\Interfaces;

use App\FormHandler\ProfilTypeHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

/**
 * Interfaces ProfilControllerInterface
 * @package App\Controller\Interfaces
 */
interface ProfilControllerInterface
{
    /**
     * ProfilControllerInterface constructor.
     * @param ProfilTypeHandler $profilTypeHandler
     * @param FormFactoryInterface $formFactory
     * @param TokenStorageInterface $tokenStorage
     * @param UrlGeneratorInterface $urlGenerator
     * @param Environment $twig
     */
    public function __construct(
        ProfilTypeHandler $profilTypeHandler,
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