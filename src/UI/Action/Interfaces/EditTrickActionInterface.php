<?php

namespace App\UI\Action\Interfaces;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Responder\Interfaces\EditTrickResponderInterface;
use App\UI\Form\Handler\Interfaces\EditTrickTypeHandlerInterface;

interface EditTrickActionInterface
{
    public function __construct(FormFactoryInterface $formFactory, EditTrickTypeHandlerInterface $editTrickTypeHandler);

    public function __invoke(Request $request, EditTrickResponderInterface $responder, ObjectManager $manager);
}