<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 17:13
 */

namespace App\Controller\Interfaces;

use App\Repository\UserRepository;
use Twig\Environment;

/**
 * Interfaces UsersControllerInterface
 * @package App\Controller\Interfaces
 */
interface UsersControllerInterface
{
    /**
     * UsersControllerInterface constructor.
     * @param UserRepository $userRepository
     * @param Environment $twig
     */
    public function __construct(
        UserRepository $userRepository,
        Environment $twig
    );

    /**
     * @return mixed
     */
    public function index();
}