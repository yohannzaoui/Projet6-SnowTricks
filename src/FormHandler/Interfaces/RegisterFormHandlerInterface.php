<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 08/11/2018
 * Time: 10:32
 */

namespace App\FormHandler\Interfaces;



use App\Helper\RegisterMail;
use App\Repository\UserRepository;
use App\Services\Interfaces\FileUploaderInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Interface RegisterFormHandlerInterface
 * @package App\FormHandler\Interfaces
 */
interface RegisterFormHandlerInterface
{

    /**
     * RegisterFormHandlerInterface constructor.
     * @param FileUploaderInterface $fileUploader
     * @param EncoderFactoryInterface $encoder
     * @param UserRepository $userRepository
     * @param RegisterMail $mail
     * @param SessionInterface $messageFlash
     */
    public function __construct(
        FileUploaderInterface $fileUploader,
        EncoderFactoryInterface $encoder,
        UserRepository $userRepository,
        RegisterMail $mail,
        SessionInterface $messageFlash
    );

    /**
     * @param FormInterface $form
     * @return mixed
     */
    public function handle(FormInterface $form);
}