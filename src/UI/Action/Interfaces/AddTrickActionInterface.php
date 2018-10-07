<?php

namespace App\UI\Action\Interfaces;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Responder\Interfaces\AddTrickResponderInterface;
use App\UI\Form\Handler\Interfaces\AddTrickTypeHandlerInterface;

interface AddTrickActionInterface
{
    public function __construct(FormFactoryInterface $formFactory, AddTrickTypeHandlerInterface $editTrickTypeHandler);

    public function __invoke(Request $request, AddTrickResponderInterface $responder);
}