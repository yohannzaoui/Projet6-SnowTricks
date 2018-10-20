<?php

namespace App\UI\Action\Interfaces;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Responder\Interfaces\TrickResponderInterface;
use App\UI\Form\Handler\Interfaces\CommentTypeHandlerInterface;

/**
 * Interface TrickActionInterface
 * @package App\UI\Action\Interfaces
 */
interface TrickActionInterface
{
    /**
     * TrickActionInterface constructor.
     * @param FormFactoryInterface $formFactory
     * @param CommentTypeHandlerInterface $commentTypeHandler
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        CommentTypeHandlerInterface $commentTypeHandler
    );

    /**
     * @param Request $request
     * @param ObjectManager $manager
     * @param TrickResponderInterface $responder
     * @return mixed
     */
    public function __invoke(Request $request, ObjectManager $manager, TrickResponderInterface $responder);
}