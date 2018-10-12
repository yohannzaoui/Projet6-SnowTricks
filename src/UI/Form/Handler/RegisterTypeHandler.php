<?php

namespace App\UI\Form\Handler;

use App\Domain\Models\User;
use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\UI\Form\Handler\Interfaces\RegisterTypeHandlerInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use App\Domain\Builder\UserBuilder;

/**
 * 
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
     * 
     */
    public function __construct(ObjectManager $manager, EncoderFactoryInterface $encoderFactory, UserBuilder $userBuilder)
    {
        $this->manager = $manager;
        $this->encoderFactory = $encoderFactory;
        $this->userBuilder = $userBuilder;
    }

    /**
     * 
     */
    public function handle(FormInterface $form, $token)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $encoder = $this->encoderFactory->getEncoder(User::class, null);
            $user = $this->userBuilder->createFromRegistration($formData->username,
                $formData->email,
                $formData->password,
                \closure::fromCallable([$encoder, 'encodePassword']),
                $token);
            $this->manager->persist($user);
            $this->manager->flush();
            return true;
        }
        return false;
    }
}