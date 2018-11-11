<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 08/11/2018
 * Time: 10:38
 */

namespace App\FormHandler\Interfaces;

use App\Repository\UserRepository;
use App\Helper\Interfaces\ResetPasswordMailInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Interface ForgotPasswordHandlerInterface
 * @package App\FormHandler\Interfaces
 */
interface ForgotPasswordHandlerInterface
{
    /**
     * ForgotPasswordHandlerInterface constructor.
     * @param UserRepository $userRepository
     * @param ResetPasswordMailInterface $mail
     * @param SessionInterface $messageFlash
     */
    public function __construct(
        UserRepository $userRepository,
        ResetPasswordMailInterface $mail,
        SessionInterface $messageFlash
    );

    /**
     * @param FormInterface $form
     * @return mixed
     */
    public function handle(FormInterface $form);
}