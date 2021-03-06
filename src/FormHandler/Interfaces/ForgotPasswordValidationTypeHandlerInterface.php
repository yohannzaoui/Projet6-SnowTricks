<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 08/11/2018
 * Time: 10:36
 */

namespace App\FormHandler\Interfaces;

use App\Repository\UserRepository;
use App\Services\Interfaces\EncoderInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormInterface;

    /**
     * Interfaces ForgotPasswordValidationTypeHandlerInterface
     * @package App\FormHandler\Interfaces
     */interface ForgotPasswordValidationTypeHandlerInterface
{
    /**
     * ForgotPasswordValidationTypeHandlerInterface constructor.
     * @param UserRepository $userRepository
     * @param EncoderInterface $encoder
     * @param SessionInterface $messageFlash
     */
    public function __construct(
        UserRepository $userRepository,
        EncoderInterface $encoder,
        SessionInterface $messageFlash
    );

    /**
     * @param $token
     * @param FormInterface $form
     * @return mixed
     */
    public function handle($token, FormInterface $form);
}