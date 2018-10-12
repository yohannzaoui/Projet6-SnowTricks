<?php

namespace App\UI\Form\Handler;

use App\Domain\Models\User;
use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\UI\Form\Handler\Interfaces\RegisterTypeHandlerInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use App\Domain\Builder\UserBuilder;
use App\Mailer\Interfaces\EmailerInterface;
use Twig\Environment;


/**
 * Class RegisterTypeHandler
 * @package App\UI\Form\Handler
 */
class RegisterTypeHandler implements RegisterTypeHandlerInterface
{
    /**
     * @var ObjectManager
     */
    private $manager;
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
     * RegisterTypeHandler constructor.
     * @param ObjectManager $manager
     * @param EncoderFactoryInterface $encoderFactory
     * @param UserBuilder $userBuilder
     */
    public function __construct(ObjectManager $manager, EncoderFactoryInterface $encoderFactory, UserBuilder $userBuilder, EmailerInterface $mail, \Swift_Mailer $mailer, Environment $twig)
    {
        $this->manager = $manager;
        $this->encoderFactory = $encoderFactory;
        $this->userBuilder = $userBuilder;
        $this->mail = $mail;
        $this->mailer = $mailer;
        $this->twig = $twig;
    }


    /**
     * @param FormInterface $form
     * @return bool|mixed
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $password = $this->encoderFactory->getEncoder(User::class)->encodePassword($form->getData()->password, null);

            $token = md5(str_rot13(crypt('abcdefghijklmnopqrstwxyz1234567890', null)));

            $this->userBuilder->createFromRegistration(
                $form->getData()->username,
                $password,
                $form->getData()->email,
                $token
            );

            $user = $this->userBuilder->getUser();
            $this->manager->persist($user);
            $this->manager->flush();

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