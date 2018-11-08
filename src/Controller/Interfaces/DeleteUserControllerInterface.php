<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 16:47
 */

namespace App\Controller\Interfaces;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface DeleteUserControllerInterface
 * @package App\Controller\Interfaces
 */
interface DeleteUserControllerInterface
{
    /**
     * DeleteUserControllerInterface constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository);

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request);
}