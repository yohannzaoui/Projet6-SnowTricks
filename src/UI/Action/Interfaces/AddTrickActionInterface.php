<?php

namespace App\UI\Action\Interfaces;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Responder\Interfaces\AddTrickResponderInterface;
use App\UI\Form\Handler\Interfaces\AddTrickTypeHandlerInterface;

/**
 * Interface AddTrickActionInterface
 * @package App\UI\Action\Interfaces
 */
interface AddTrickActionInterface
{
    /**
     * AddTrickActionInterface constructor.
     * @param FormFactoryInterface $formFactory
     * @param AddTrickTypeHandlerInterface $editTrickTypeHandler
     */
    public function __construct(FormFactoryInterface $formFactory, AddTrickTypeHandlerInterface $editTrickTypeHandler);

    /**
     * @param Request $request
     * @param AddTrickResponderInterface $responder
     * @param ObjectManager $manager
     * @return mixed
     */
    public function __invoke(Request $request, AddTrickResponderInterface $responder);
}