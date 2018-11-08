<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 16:49
 */

namespace App\Controller\Interfaces;

use App\FormHandler\ForgotPasswordHandler;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface ForgotPasswordControllerInterface
 * @package App\Controller\Interfaces
 */
interface ForgotPasswordControllerInterface
{
    /**
     * ForgotPasswordControllerInterface constructor.
     * @param ForgotPasswordHandler $forgotPasswordHandler
     */
    public function __construct(ForgotPasswordHandler $forgotPasswordHandler);

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request);
}