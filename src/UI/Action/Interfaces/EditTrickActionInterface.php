<?php

namespace App\UI\Action\Interfaces;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Responder\Interfaces\EditTrickResponderInterface;
use App\UI\Form\Handler\Interfaces\EditTrickTypeHandlerInterface;

/**
 * Interface EditTrickActionInterface
 * @package App\UI\Action\Interfaces
 */
interface EditTrickActionInterface
{
    /**
     * EditTrickActionInterface constructor.
     * @param FormFactoryInterface $formFactory
     * @param EditTrickTypeHandlerInterface $editTrickTypeHandler
     */
    public function __construct(FormFactoryInterface $formFactory, EditTrickTypeHandlerInterface $editTrickTypeHandler);

    /**
     * @param Request $request
     * @param EditTrickResponderInterface $responder
     * @param ObjectManager $manager
     * @return mixed
     */
    public function __invoke(Request $request, EditTrickResponderInterface $responder, ObjectManager $manager);
}