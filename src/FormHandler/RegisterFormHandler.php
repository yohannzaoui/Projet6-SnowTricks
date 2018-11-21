<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 13:48
 */

namespace App\FormHandler;


use App\Entity\User;
use App\FormHandler\Interfaces\RegisterFormHandlerInterface;
use App\Helper\RegisterMail;
use App\Repository\UserRepository;
use App\Services\Interfaces\FileUploaderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Class RegisterFormHandler
 * @package App\FormHandler
 */
final class RegisterFormHandler implements RegisterFormHandlerInterface
{

    /**
     * @var FileUploaderInterface
     */
    private $fileUploader;

    /**
     * @var EncoderFactoryInterface
     */
    private $encoder;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var RegisterMail
     */
    private $mail;
    /**
     * @var SessionInterface
     */
    private $messageFlash;


    /**
     * RegisterFormHandler constructor.
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
    ) {
        $this->fileUploader = $fileUploader;
        $this->encoder = $encoder;
        $this->userRepository = $userRepository;
        $this->mail = $mail;
        $this->messageFlash = $messageFlash;
    }

    /**
     * @param FormInterface $form
     * @return bool
     * @throws \Exception
     */
    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $user = new User();

            if ($form->getData()->getProfilImage()) {

                $file = $form->getData()->getProfilImage();

                $fileName = $this->fileUploader->upload($file);

                $user->setProfilImage($fileName);

            }

            $token = md5(uniqid());

            $user->setUsername($form->getData()
                ->getUsername()
            );
            $user->setPassword($this->encoder->getEncoder(
                User::class)->encodePassword(
                $form->getData()->getPassword(), null
            ));
            $user->setEmail($form->getData()->getEmail());
            $user->setToken($token);

            $this->userRepository->save($user);

            $this->mail->send($form->getData()->getEmail(), $token);

            $this->messageFlash->getFlashBag()->add('register',
                'Un email à l\'adresse ' .$form->getData()
                    ->getEmail(). ' vient de vous être envoyez pour la validation de votre compte');

            return true;
        }
        return false;
    }
}