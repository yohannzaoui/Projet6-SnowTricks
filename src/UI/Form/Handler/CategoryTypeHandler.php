<?php

namespace App\UI\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\UI\Form\Handler\Interfaces\CategoryTypeHandlerInterface;


/**
 * Class CategoryTypeHandler
 * @package App\UI\Form\Handler
 */
class CategoryTypeHandler implements CategoryTypeHandlerInterface
{

    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * CategoryTypeHandler constructor.
     * @param ObjectManager $manager
     */
    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param FormInterface $form
     * @param $category
     * @return bool
     */
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