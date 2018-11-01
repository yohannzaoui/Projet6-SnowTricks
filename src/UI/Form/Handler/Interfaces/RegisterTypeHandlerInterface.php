<?php

namespace App\UI\Form\Handler\Interfaces;

use App\Domain\Builder\Interfaces\ImageBuilderInterface;
use App\Domain\Builder\UserBuilder;
use App\Domain\Repository\ImageRepository;
use App\Domain\Repository\UserRepository;
use App\Mailer\Interfaces\EmailerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Twig\Environment;
use App\Services\Interfaces\FileUploaderInterface;

/**
 * Interface RegisterTypeHandlerInterface
 * @package App\UI\Form\Handler\Interfaces
 */
interface RegisterTypeHandlerInterface
{


    /**
     * RegisterTypeHandlerInterface constructor.
     * @param UserRepository $userRepository
     * @param EncoderFactoryInterface $encoderFactory
     * @param UserBuilder $userBuilder
     * @param EmailerInterface $mail
     * @param \Swift_Mailer $mailer
     * @param Environment $twig
     * @param SessionInterface $messageFlash
     * @param ImageBuilderInterface $imageBuilder
     * @param FileUploaderInterface $fileUploader
     */
    public function __construct(
        UserRepository $userRepository,
        EncoderFactoryInterface $encoderFactory,
        UserBuilder $userBuilder,
        EmailerInterface $mail,
        \Swift_Mailer $mailer,
        Environment $twig,
        SessionInterface $messageFlash,
        ImageBuilderInterface $imageBuilder,
        FileUploaderInterface $fileUploader
    );

    /**
     * @param FormInterface $form
     * @param $token
     * @return mixed
     */
    public function handle(FormInterface $form);
}