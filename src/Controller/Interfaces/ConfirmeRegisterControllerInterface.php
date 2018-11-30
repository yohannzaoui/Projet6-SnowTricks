<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 16:41
 */

namespace App\Controller\Interfaces;

use Symfony\Component\HttpFoundation\Request;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Twig\Environment;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Interfaces ConfirmeControllerInterface
 * @package App\Controller\Interfaces
 */
Interface ConfirmeRegisterControllerInterface
{

    /**
     * ConfirmeRegisterControllerInterface constructor.
     * @param UserRepository $userRepository
     * @param SessionInterface $messageFlash
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        UserRepository $userRepository,
        SessionInterface $messageFlash,
        Environment $twig,
        UrlGeneratorInterface $urlGenerator
    );

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request);
}