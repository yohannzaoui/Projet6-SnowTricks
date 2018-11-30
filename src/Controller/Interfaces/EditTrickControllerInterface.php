<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 21/11/2018
 * Time: 11:50
 */

namespace App\Controller\Interfaces;

use App\FormHandler\Interfaces\EditTrickHandlerInterface;
use App\Repository\TrickRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

/**
 * Interfaces EditTrickControllerInterface
 * @package App\Controller\Interfaces
 */
interface EditTrickControllerInterface
{
    /**
     * EditTrickControllerInterface constructor.
     * @param EditTrickHandlerInterface $editTrickHandler
     * @param TrickRepository $trickRepository
     * @param FormFactoryInterface $formFactory
     * @param TokenStorageInterface $tokenStorage
     * @param UrlGeneratorInterface $urlGenerator
     * @param Environment $twig
     */
    public function __construct(
        EditTrickHandlerInterface $editTrickHandler,
        TrickRepository $trickRepository,
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