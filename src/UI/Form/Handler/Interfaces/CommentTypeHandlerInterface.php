<?php

namespace App\UI\Form\Handler\Interfaces;

use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Interface CommentTypeHandlerInterface
 * @package App\UI\Form\Handler\Interfaces
 */
interface CommentTypeHandlerInterface
{
    /**
     * CommentTypeHandlerInterface constructor.
     * @param ObjectManager $manager
     */
    public function __construct(ObjectManager $manager);

    /**
     * @param FormInterface $form
     * @param $trick
     * @return bool
     */
    public function handle(FormInterface $form, $trick): bool;
}