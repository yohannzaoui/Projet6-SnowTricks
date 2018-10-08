<?php

namespace App\UI\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\UI\Form\Handler\Interfaces\EditTrickTypeHandlerInterface;

/**
 * 
 */
class EditTrickTypeHandler implements EditTrickTypeHandlerInterface
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
            if (!$trick->getId()) {
                $trick->setCreatedAt(new \DateTime());
            } else {
                $trick->setUpdatedAt(new \DateTime());
            }
            $this->manager->persist($trick);
            $this->manager->flush();
            return true;
        }
        return false;
    }
    
}