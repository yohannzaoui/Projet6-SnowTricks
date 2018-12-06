<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 13:48
 */

namespace App\FormHandler;


use App\Entity\User;
use App\Event\RegisterMailEvent;
use App\FormHandler\Interfaces\RegisterFormHandlerInterface;
use App\Repository\UserRepository;
use App\Services\Interfaces\EmailerInterface;
use App\Services\Interfaces\FileUploaderInterface;
use App\Services\Interfaces\TokenInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Services\Interfaces\EncoderInterface;

/**
 * Class RegisterFormHandler
 * @package App\FormHandler
 */
class RegisterFormHandler implements RegisterFormHandlerInterface
{

    /**
     * @var FileUploaderInterface
     */
    private $fileUploader;

    /**
     * @var EncoderInterface
     */
    private $encoder;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var EmailerInterface
     */
    private $emailer;

    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var TokenInterface
     */
    private $tokenService;

    /**
     * RegisterFormHandler constructor.
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
    ) {
        $this->fileUploader = $fileUploader;
        $this->encoder = $encoder;
        $this->userRepository = $userRepository;
        $this->emailer = $emailer;
        $this->messageFlash = $messageFlash;
        $this->eventDispatcher = $eventDispatcher;
        $this->tokenService = $tokenService;
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

            $token = $this->tokenService::generateToken();

            $user->setUsername($form->getData()
                ->getUsername()
            );
            $user->setPassword($this->encoder->encodePassword(
                User::class, $form->getData()->getPassword())
            );
            $user->setEmail($form->getData()->getEmail());
            $user->setToken($token);

            $this->userRepository->save($user);

            $this->eventDispatcher->dispatch(RegisterMailEvent::NAME,
                new RegisterMailEvent($this->emailer, $form->getData()->getEmail(), $token ));

            $this->messageFlash->getFlashBag()->add('register',
                'Un email à l\'adresse ' .$form->getData()
                    ->getEmail(). ' vient de vous être envoyez pour la validation de votre compte');

            return true;
        }
        return false;
    }
}