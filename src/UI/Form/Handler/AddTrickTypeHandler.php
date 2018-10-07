<?php

namespace App\UI\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\UI\Form\Handler\Interfaces\AddTrickTypeHandlerInterface;

/**
 * 
 */
class AddTrickTypeHandler implements AddTrickTypeHandlerInterface
{
    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * 
     */
    public function handle(FormInterface $form, $trick)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $trick->setCreatedAt(new \DateTime());
            $this->manager->persist($trick);
            $this->manager->flush();
            return true;
        }
        return false;
    }
    
}