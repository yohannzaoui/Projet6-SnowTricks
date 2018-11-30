<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 16:47
 */

namespace App\Controller\Interfaces;

use App\Repository\UserRepository;
use App\Services\FileRemover;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Interfaces DeleteUserControllerInterface
 * @package App\Controller\Interfaces
 */
interface DeleteUserControllerInterface
{

    /**
     * DeleteUserControllerInterface constructor.
     * @param UserRepository $userRepository
     * @param FileRemover $fileRemover
     * @param TokenStorageInterface $tokenStorage
     * @param UrlGeneratorInterface $urlGenerator
     * @param SessionInterface $messageFlash
     */
    public function __construct(
        UserRepository $userRepository,
        FileRemover $fileRemover,
        TokenStorageInterface $tokenStorage,
        UrlGeneratorInterface $urlGenerator,
        SessionInterface $messageFlash
    );

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request);
}