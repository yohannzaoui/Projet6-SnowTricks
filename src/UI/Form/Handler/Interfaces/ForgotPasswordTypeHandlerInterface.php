<?php

namespace App\UI\Form\Handler\Interfaces;

use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Mailer\Interfaces\EmailerInterface;
use App\Domain\Repository\UserRepository;
use Twig\Environment;

/**
 * Interface ForgotPasswordTypeHandlerInterface
 * @package App\UI\Form\Handler\Interfaces
 */
interface ForgotPasswordTypeHandlerInterface
{
    /**
     * ForgotPasswordTypeHandlerInterface constructor.
     * @param ObjectManager $manager
     */
    public function __construct(EmailerInterface $mail, \Swift_Mailer $mailer, Environment $twig, UserRepository $userRepository);

    /**
     * @param FormInterface $form
     * @return mixed
     */
    public function handle(FormInterface $form);
}