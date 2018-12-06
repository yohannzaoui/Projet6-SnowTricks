<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 17:11
 */

namespace App\Controller\Interfaces;

use App\FormHandler\Interfaces\CommentHandlerInterface;
use App\Repository\TrickRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\CommentRepository;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Twig\Environment;

/**
 * Interfaces TrickControllerInterface
 * @package App\Controller\Interfaces
 */
interface TrickControllerInterface
{
    /**
     * TrickControllerInterface constructor.
     * @param TrickRepository $trickRepository
     * @param CommentHandlerInterface $commentHandler
     * @param CommentRepository $commentRepository
     * @param FormFactoryInterface $formFactory
     * @param UrlGeneratorInterface $urlGenerator
     * @param TokenStorageInterface $tokenStorage
     * @param Environment $twig
     */
    public function __construct(
        TrickRepository $trickRepository,
        CommentHandlerInterface $commentHandler,
        CommentRepository $commentRepository,
        FormFactoryInterface $formFactory,
        UrlGeneratorInterface $urlGenerator,
        TokenStorageInterface $tokenStorage,
        Environment $twig

    );

    /**
     * @param Request $request
     * @param int $page
     * @return mixed
     */
    public function index(Request $request, $page = 1);
}