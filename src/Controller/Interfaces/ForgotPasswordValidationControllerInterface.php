<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 16:56
 */

namespace App\Controller\Interfaces;

use App\Repository\UserRepository;
use App\FormHandler\ForgotPasswordValidationTypeHandler;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface ForgotPasswordValidationInterface
 * @package App\Controller\Interfaces
 */
interface ForgotPasswordValidationControllerInterface
{
    /**
     * ForgotPasswordValidationInterface constructor.
     * @param UserRepository $userRepository
     * @param ForgotPasswordValidationTypeHandler $forgotPasswordValidationTypeHandler
     */
    public function __construct(
        UserRepository $userRepository,
        ForgotPasswordValidationTypeHandler $forgotPasswordValidationTypeHandler
    );

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request);
}