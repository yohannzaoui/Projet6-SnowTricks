<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 16:47
 */

namespace App\Controller\Interfaces;

use App\Repository\UserRepository;
use App\Services\Interfaces\FileRemoverInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
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
     * @param FileRemoverInterface $fileRemover
     * @param TokenStorageInterface $tokenStorage
     * @param UrlGeneratorInterface $urlGenerator
     * @param SessionInterface $messageFlash
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(
        UserRepository $userRepository,
        FileRemoverInterface $fileRemover,
        TokenStorageInterface $tokenStorage,
        UrlGeneratorInterface $urlGenerator,
        SessionInterface $messageFlash,
        EventDispatcherInterface $eventDispatcher
    );

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request);
}