<?php

namespace App\UI\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\UI\Form\Handler\Interfaces\CategoryTypeHandlerInterface;


class CategoryTypeHandler implements CategoryTypeHandlerInterface
{

    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function handle(FormInterface $form, $category)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $this->manager->persist($category);
            $this->manager->flush();
            return true;
        }
        return false;
    }
}