<?php

namespace App\UI\Action;

use App\Domain\Models\Trick;
use App\UI\Form\EditTrickType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Action\Interfaces\EditTrickActionInterface;
use App\UI\Responder\Interfaces\EditTrickResponderInterface;
use App\UI\Form\Handler\Interfaces\EditTrickTypeHandlerInterface;

/**
 * 
 */
class EditTrickAction implements EditTrickActionInterface
{
    private $formFactory;

    /**
     * 
     */
    public function __construct(FormFactoryInterface $formFactory,
        EditTrickTypeHandlerInterface $editTrickTypeHandler
    ) {
        $this->formFactory = $formFactory;
        $this->editTrickTypeHandler = $editTrickTypeHandler;
    }

    /**
     * 
     * @Route("/ajouterTrick", name="addtrick", methods={"GET","POST"})
     * @Route("/modifierTrick/{id}", name="updatetrick", methods={"GET","POST"})
     * 
     */
    public function __invoke(Request $request, EditTrickResponderInterface $responder, ObjectManager $manager)
    {
        if (!$request->get('id')) {
            $trick = new Trick;
        }

        if ($request->get('id')) {
            $trick = $manager->getRepository(Trick::class)->find($request->get('id'));
        }
        
        $form = $this->formFactory->create(EditTrickType::class, $trick)
                                  ->handleRequest($request);

        if ($this->editTrickTypeHandler->handle($form, $trick)) {
            return $responder(true, $form, $trick);
        }
        return $responder(false, $form, $trick);
    }
}