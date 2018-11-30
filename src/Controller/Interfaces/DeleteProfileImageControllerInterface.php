<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 17/11/2018
 * Time: 21:34
 */

namespace App\Controller\Interfaces;

use App\Repository\UserRepository;
use App\Services\FileRemover;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Interfaces DeleteProfileImageControllerInterface
 * @package App\Controller\Interfaces
 */
interface DeleteProfileImageControllerInterface
{
    /**
     * DeleteProfileImageControllerInterface constructor.
     * @param TokenStorageInterface $tokenStorage
     * @param SessionInterface $messageFlash
     * @param UserRepository $userRepository
     * @param FileRemover $fileRemover
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        TokenStorageInterface $tokenStorage,
        SessionInterface $messageFlash,
        UserRepository $userRepository,
        FileRemover $fileRemover,
        UrlGeneratorInterface $urlGenerator
    );


    /**
     * @return mixed
     */
    public function index();
}