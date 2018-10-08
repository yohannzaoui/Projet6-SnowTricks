<?php

namespace App\UI\Form\Handler\Interfaces;

use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;

interface CommentTypeHandlerInterface
{
    public function __construct(ObjectManager $manager);
    
    public function handle(FormInterface $form, $trick, $comment): bool;
}