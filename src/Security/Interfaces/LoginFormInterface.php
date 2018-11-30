<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 24/11/2018
 * Time: 17:46
 */

namespace App\Security\Interfaces;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

/**
 * Interfaces LoginFormInterface
 * @package App\Security\Interfaces
 */
interface LoginFormInterface
{
    /**
     * LoginFormInterface constructor.
     * @param EntityManagerInterface $entityManager
     * @param RouterInterface $router
     * @param CsrfTokenManagerInterface $csrfTokenManager
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        RouterInterface $router,
        CsrfTokenManagerInterface $csrfTokenManager,
        UserPasswordEncoderInterface $passwordEncoder
    );

    /**
     * @param Request $request
     * @return mixed
     */
    public function supports(Request $request);

    /**
     * @param Request $request
     * @return mixed
     */
    public function getCredentials(Request $request);

    /**
     * @param $credentials
     * @param UserProviderInterface $userProvider
     * @return mixed
     */
    public function getUser($credentials, UserProviderInterface $userProvider);

    /**
     * @param $credentials
     * @param UserInterface $user
     * @return mixed
     */
    public function checkCredentials($credentials, UserInterface $user);

    /**
     * @param Request $request
     * @param TokenInterface $token
     * @param $providerKey
     * @return mixed
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey);

}