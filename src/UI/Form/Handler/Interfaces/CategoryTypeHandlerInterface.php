<?php

namespace App\UI\Form\Handler\Interfaces;

use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Interface CategoryTypeHandlerInterface
 * @package App\UI\Form\Handler\Interfaces
 */
interface CategoryTypeHandlerInterface
{
    /**
     * CategoryTypeHandlerInterface constructor.
     * @param ObjectManager $manager
     */
    public function __construct(ObjectManager $manager);

    /**
     * @param FormInterface $form
     * @param $category
     * @return mixed
     */
    public function handle(FormInterface $form, $category);
}