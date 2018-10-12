<?php

namespace App\UI\Action\Interfaces;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Responder\Interfaces\TrickResponderInterface;
use App\UI\Form\Handler\Interfaces\CommentTypeHandlerInterface;

interface TrickActionInterface
{
    public function __construct(FormFactoryInterface $formFactory, CommentTypeHandlerInterface $commentTypeHandler);

    public function __invoke(Request $request, ObjectManager $manager, TrickResponderInterface $responder);
}