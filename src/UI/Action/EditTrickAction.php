<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 14/10/2018
 * Time: 15:40
 */

namespace App\UI\Action;

use App\UI\Form\EditTrickType;
use App\Domain\Repository\TrickRepository;
use App\UI\Responder\Interfaces\EditTrickActionResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Form\Handler\Interfaces\EditTrickTypeHandlerInterface;

/**
 * Class EditTrickAction
 * @package App\UI\Action
 */
class EditTrickAction
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;
    /**
     * @var EditTrickTypeHandlerInterface
     */
    private $editTrickTypeHandler;
    /**
     * @var TrickRepository
     */
    private $trickRepository;

    /**
     * EditTrickAction constructor.
     * @param FormFactoryInterface $formFactory
     * @param EditTrickTypeHandlerInterface $editTrickTypeHandler
     * @param TrickRepository $trickRepository
     */
    public function __construct(FormFactoryInterface $formFactory,
                                EditTrickTypeHandlerInterface $editTrickTypeHandler,
                                TrickRepository $trickRepository
    ) {
        $this->formFactory = $formFactory;
        $this->editTrickTypeHandler = $editTrickTypeHandler;
        $this->trickRepository = $trickRepository;
    }


    /**
     * @Route("/modifierTrick/{id}", name="edittrick", methods={"GET","POST"})
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function __invoke(Request $request, EditTrickActionResponderInterface $responder)
    {
        if ($request->get('id')){
            $trick= $this->trickRepository->getTrick($request->get('id'));

            $form = $this->formFactory->create(EditTrickType::class)->handleRequest($request);

            if ($this->editTrickTypeHandler->handle($form)){
                return $responder(true, $form, $trick);
            }
        } return $responder(false, $form, $trick);
    }
}