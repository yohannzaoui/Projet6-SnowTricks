<?php

namespace App\UI\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\UI\Form\Handler\Interfaces\RegisterTypeHandlerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;


class RegisterTypeHandler implements RegisterTypeHandlerInterface
{
    private $manager;
    private $encoder;

    public function __construct(ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $this->manager = $manager;
        $this->encoder = $encoder;
    }

    public function handle(FormInterface $form, $user)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $this->encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $user->setCreatedAt(new \DateTime);
            $this->manager->persist($user);
            $this->manager->flush();
            return true;
        }
        return false;
    }
}