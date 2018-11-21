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

/**
 * Interface DeleteProfileImageControllerInterface
 * @package App\Controller\Interfaces
 */
interface DeleteProfileImageControllerInterface
{
    /**
     * @param UserRepository $userRepository
     * @param FileRemover $fileRemover
     * @return mixed
     */
    public function index(UserRepository $userRepository, FileRemover $fileRemover);
}