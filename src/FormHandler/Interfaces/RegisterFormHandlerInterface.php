<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 08/11/2018
 * Time: 10:32
 */

namespace App\FormHandler\Interfaces;


use App\Repository\UserRepository;
use App\Services\Interfaces\FileUploaderInterface;
use App\Services\Interfaces\TokenInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use App\Services\Interfaces\EncoderInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormInterface;
use App\Services\Interfaces\EmailerInterface;

/**
 * Interfaces RegisterFormHandlerInterface
 * @package App\FormHandler\Interfaces
 */
interface RegisterFormHandlerInterface
{

    /**
     * RegisterFormHandlerInterface constructor.
     * @param FileUploaderInterface $fileUploader
     * @param EncoderInterface $encoder
     * @param UserRepository $userRepository
     * @param EmailerInterface $emailer
     * @param SessionInterface $messageFlash
     * @param EventDispatcherInterface $eventDispatcher
     * @param TokenInterface $tokenService
     */
    public function __construct(
        FileUploaderInterface $fileUploader,
        EncoderInterface $encoder,
        UserRepository $userRepository,
        EmailerInterface $emailer,
        SessionInterface $messageFlash,
        EventDispatcherInterface $eventDispatcher,
        TokenInterface $tokenService
    );

    /**
     * @param FormInterface $form
     * @return mixed
     */
    public function handle(FormInterface $form);
}