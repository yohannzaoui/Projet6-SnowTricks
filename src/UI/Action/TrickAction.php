<?php

namespace App\UI\Action;

use App\Domain\Models\Trick;
use App\UI\Form\CommentType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Action\Interfaces\TrickActionInterface;
use App\UI\Responder\Interfaces\TrickResponderInterface;
use App\UI\Form\Handler\Interfaces\CommentTypeHandlerInterface;

/**
 *
 */
class TrickAction implements TrickActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;
    /**
     * @var CommentTypeHandlerInterface
     */
    private $commentTypeHandler;

    /**
     * 
     */
    public function __construct(FormFactoryInterface $formFactory,
        CommentTypeHandlerInterface $commentTypeHandler
    ) {
        $this->formFactory = $formFactory;
        $this->commentTypeHandler = $commentTypeHandler;
    }

    /**
     *
     * @Route("/tricks/details/{id}", name="trick", methods={"GET","POST"})
     */
    public function __invoke(Request $request, ObjectManager $manager, TrickResponderInterface $responder)
    {
        $trick = $manager->getRepository(Trick::class)->find($request->get('id'));

        $form = $this->formFactory->create(CommentType::class)->handleRequest($request);

        if ($this->commentTypeHandler->handle($form, $trick)) {
            return $responder(true, $form, $trick);
        }
        return $responder(false, $form, $trick);
    }
}