<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 29/11/2018
 * Time: 21:25
 */

namespace App\Controller\Interfaces;


use App\FormHandler\AddTrickHandler;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Twig\Environment;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface AddTrickControllerInterface
 * @package App\Controller\Interfaces
 */
interface AddTrickControllerInterface
{
    /**
     * AddTrickControllerInterface constructor.
     * @param AddTrickHandler $addTrickHandler
     * @param TokenStorageInterface $tokenStorage
     * @param Environment $twig
     * @param FormFactoryInterface $formFactory
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        AddTrickHandler $addTrickHandler,
        TokenStorageInterface $tokenStorage,
        Environment $twig,
        FormFactoryInterface $formFactory,
        UrlGeneratorInterface $urlGenerator
    );

    public function index(Request $request);
}