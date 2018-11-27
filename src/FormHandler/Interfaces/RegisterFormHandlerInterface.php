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
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
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
     * @param EncoderFactoryInterface $encoder
     * @param UserRepository $userRepository
     * @param EmailerInterface $emailer
     * @param SessionInterface $messageFlash
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(
        FileUploaderInterface $fileUploader,
        EncoderFactoryInterface $encoder,
        UserRepository $userRepository,
        EmailerInterface $emailer,
        SessionInterface $messageFlash,
        EventDispatcherInterface $eventDispatcher
    );

    /**
     * @param FormInterface $form
     * @return mixed
     */
    public function handle(FormInterface $form);
}