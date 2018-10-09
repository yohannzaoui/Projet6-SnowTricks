<?php

namespace App\UI\Form\Handler;

use App\Domain\Models\User;
use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\UI\Form\Handler\Interfaces\RegisterTypeHandlerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * 
 */
class RegisterTypeHandler implements RegisterTypeHandlerInterface
{
    private $manager;
    private $encoder;

    /**
     * 
     */
    public function __construct(ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $this->manager = $manager;
        $this->encoder = $encoder;
    }

    /**
     * 
     */
    public function handle(FormInterface $form, $token)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $user = new User;
            $data = $form->getData();
            $username = $data->username;
            $email = $data->email;
            $hash = $this->encoder->encodePassword($user, $data->password);
            $user->setUsername($username)
                 ->setEmail($email)
                 ->setPassword($hash)
                 ->setToken($token);
            $this->manager->persist($user);
            $this->manager->flush();
            return true;
        }
        return false;
    }
}