<?php

namespace App\UI\Action;

use App\Domain\Models\Trick;
use App\UI\Form\AddTrickType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Action\Interfaces\AddTrickActionInterface;
use App\UI\Responder\Interfaces\AddTrickResponderInterface;
use App\UI\Form\Handler\Interfaces\AddTrickTypeHandlerInterface;

/**
 * 
 */
class AddTrickAction implements AddTrickActionInterface
{
    private $formFactory;

    /**
     * 
     */
    public function __construct(FormFactoryInterface $formFactory,
        AddTrickTypeHandlerInterface $addTrickTypeHandler
    ) {
        $this->formFactory = $formFactory;
        $this->addTrickTypeHandler = $addTrickTypeHandler;
    }

    /**
     * 
     * @Route("/ajouterTrick", name="addtrick", methods={"GET","POST"})
     */
    public function __invoke(Request $request, AddTrickResponderInterface $responder)
    {
        $trick = new Trick;
        
        $form = $this->formFactory->create(AddTrickType::class, $trick)
                                  ->handleRequest($request);

        if ($this->addTrickTypeHandler->handle($form, $trick)) {
            return $responder(true);
        }
        return $responder(false, $form);
    }
}