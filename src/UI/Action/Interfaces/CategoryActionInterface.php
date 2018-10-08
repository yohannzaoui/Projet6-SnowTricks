<?php

namespace App\UI\Action\Interfaces;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Form\Handler\Interfaces\CategoryTypeHandlerInterface;
use App\UI\Responder\Interfaces\CategoryActionResponderInterface;

interface CategoryActionInterface
{
    public function __construct(FormFactoryInterface $formFactory, CategoryTypeHandlerInterface $categoryTypeHandler);
    
    public function __invoke(Request $request, CategoryActionResponderInterface $responder, ObjectManager $manager);
}