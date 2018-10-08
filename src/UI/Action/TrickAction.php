<?php

namespace App\UI\Action;

use App\Domain\Models\Trick;
use App\Domain\Models\Comment;
use App\UI\Form\CommentType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Action\Interfaces\TrickActionInterface;
use App\UI\Responder\Interfaces\TrickResponderInterface;
use App\UI\Form\Handler\Interfaces\CommentTypeHandlerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * 
 */
class TrickAction implements TrickActionInterface
{
    private $formFactory;
    private $commentTypeHandler;
    private $redirect;

    /**
     * 
     */
    public function __construct(FormFactoryInterface $formFactory,
        CommentTypeHandlerInterface $commentTypeHandler,
        UrlGeneratorInterface $redirect
    ) {
        $this->formFactory = $formFactory;
        $this->commentTypeHandler = $commentTypeHandler;
        $this->redirect = $redirect;
    }

    /**
     * 
     * @Route("/tricks/details/{id}", name="trick", methods={"GET","POST"})
     */
    public function __invoke(Request $request,
        ObjectManager $manager,
        TrickResponderInterface $responder
    ) {
        $trick = $manager->getRepository(Trick::class)->find($request->get('id'));

        $comment = new Comment;
        $form = $this->formFactory->create(CommentType::class, $comment)
                                  ->handleRequest($request);

        if ($this->commentTypeHandler->handle($form, $trick, $comment)) {
            $this->redirect->generate('trick', [
                'id' => $request->get('id')
            ]);
        }

        return $responder($form, $trick);
    }
}