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

/**
 * Interface ConfirmeControllerInterface
 * @package App\Controller\Interfaces
 */
Interface ConfirmeRegisterControllerInterface
{
    /**
     * ConfirmeControllerInterface constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository);

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request);
}