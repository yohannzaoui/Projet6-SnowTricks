<?php

namespace App\UI\Action\Interfaces;

use Symfony\Component\HttpFoundation\Request;
use App\UI\Responder\Interfaces\ConfirmeRegisterActionResponderInterface;
use App\Domain\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Interface ConfirmeRegisterActionInterface
 * @package App\UI\Action\Interfaces
 */
interface ConfirmeRegisterActionInterface
{
    public function __construct(
        UserRepository $userRepository,
        SessionInterface $messageFlash
    );

    /**
     * @param Request $request
     * @param ConfirmeRegisterActionResponderInterface $responder
     * @return mixed
     */
    public function __invoke(Request $request, ConfirmeRegisterActionResponderInterface $responder);
}