<?php

namespace App\UI\Form\Handler;

use App\Domain\Models\User;
use App\Domain\Repository\UserRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormInterface;
use App\UI\Form\Handler\Interfaces\RegisterTypeHandlerInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use App\Domain\Builder\UserBuilder;
//use App\Event\UserCreateEvent;
use App\Mailer\Interfaces\EmailerInterface;
use Twig\Environment;


/**
 * Class RegisterTypeHandler
 * @package App\UI\Form\Handler
 */
class RegisterTypeHandler implements RegisterTypeHandlerInterface
{

    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var EncoderFactoryInterface
     */
    private $encoderFactory;
    /**
     * @var UserBuilder
     */
    private $userBuilder;

    /**
     * @var EmailerInterface
     */
    private $mail;

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;


    /**
     * RegisterTypeHandler constructor.
     * @param EncoderFactoryInterface $encoderFactory
     * @param UserBuilder $userBuilder
     */
    public function __construct(
        UserRepository $userRepository,
        EncoderFactoryInterface $encoderFactory,
        UserBuilder $userBuilder,
        EmailerInterface $mail,
        \Swift_Mailer $mailer,
        Environment $twig,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->userRepository = $userRepository;
        $this->encoderFactory = $encoderFactory;
        $this->userBuilder = $userBuilder;
        $this->mail = $mail;
        $this->mailer = $mailer;
        $this->twig = $twig;
        $this->eventDispatcher = $eventDispatcher;

    }


    /**
     * @param FormInterface $form
     * @return bool|mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $password = $this->encoderFactory->getEncoder(User::class)->encodePassword($form->getData()->password, null);

            $token = md5(uniqid());

            $this->userBuilder->createFromRegistration(
                $form->getData()->username,
                $password,
                $form->getData()->email,
                $token
            );

            $user = $this->userBuilder->getUser();
            $this->userRepository->save($user);

            //$this->eventDispatcher->dispatch(UserCreateEvent::NAME, new UserCreateEvent($form->getData()->email, $token, $this->twig, $this->mailer));

            $email = $this->mail->mail('Validation de votre compte Snow Tricks',
                ['register@snowtrick.com' => 'Inscription à Snow Tricks'],
                $form->getData()->email,
                $this->twig->render('email/registration.html.twig', [
                    'token' => $token
                ]));

            $this->mailer->send($email);

            return true;
        }
        return false;
    }
}