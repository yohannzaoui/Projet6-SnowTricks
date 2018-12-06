<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 17:04
 */

namespace App\Controller\Interfaces;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;

/**
 * Interfaces LoginControllerInterface
 * @package App\Controller\Interfaces
 */
interface LoginControllerInterface
{
    /**
     * LoginControllerInterface constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param AuthenticationUtils $authenticationUtils
     * @return mixed
     */
    public function index(AuthenticationUtils $authenticationUtils);
}