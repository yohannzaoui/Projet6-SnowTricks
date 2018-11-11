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

/**
 * Interface DeleteUserControllerInterface
 * @package App\Controller\Interfaces
 */
interface DeleteUserControllerInterface
{

    /**
     * DeleteUserControllerInterface constructor.
     * @param UserRepository $userRepository
     * @param FileRemover $fileRemover
     */
    public function __construct(
        UserRepository $userRepository,
        FileRemover $fileRemover
    );

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request);
}