<?php

namespace App\UI\Form\Handler\Interfaces;

use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

interface RegisterTypeHandlerInterface
{
    public function __construct(ObjectManager $manager, UserPasswordEncoderInterface $encoder);

    public function handle(FormInterface $form, $token);
}