<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 17:13
 */

namespace App\Controller\Interfaces;

use App\Repository\UserRepository;

/**
 * Interface UsersControllerInterface
 * @package App\Controller\Interfaces
 */
interface UsersControllerInterface
{
    /**
     * UsersControllerInterface constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository);

    /**
     * @return mixed
     */
    public function index();
}