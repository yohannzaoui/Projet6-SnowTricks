<?php

namespace App\UI\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\UI\Form\Handler\Interfaces\ForgotPasswordTypeHandlerInterface;


class ForgotPasswordTypeHandler implements ForgotPasswordTypeHandlerInterface
{
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isvalid()) {
            return true;
        }
        return false;
    }
}