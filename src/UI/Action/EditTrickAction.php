<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 14/10/2018
 * Time: 15:40
 */

namespace App\UI\Action;


use App\Domain\DTO\DTOFactory\Interfaces\TrickDTOFactoryInterface;
use App\Domain\Repository\TrickRepository;
use App\UI\Form\FormUpdateTrick\UpdateTrickType;
use App\UI\Responder\Interfaces\EditTrickActionResponderInterface;
use Doctrine\Common\Persistence\ObjectManager;
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
     * @var TrickDTOFactoryInterface
     */
    private $trickDTOFactory;


    /**
     * EditTrickAction constructor.
     * @param FormFactoryInterface $formFactory
     * @param EditTrickTypeHandlerInterface $editTrickTypeHandler
     * @param TrickRepository $trickRepository
     * @param TrickDTOFactoryInterface $trickDTOFactory
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        EditTrickTypeHandlerInterface $editTrickTypeHandler,
        TrickRepository $trickRepository,
        TrickDTOFactoryInterface $trickDTOFactory

    ) {
        $this->formFactory = $formFactory;
        $this->editTrickTypeHandler = $editTrickTypeHandler;
        $this->trickRepository = $trickRepository;
        $this->trickDTOFactory = $trickDTOFactory;
    }


    /**
     * @Route("/modifierTrick/{id}", name="edittrick", methods={"GET","POST"})
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function __invoke(Request $request, ObjectManager $manager, EditTrickActionResponderInterface $responder)
    {
        if ($request->attributes->get('id')){
            $trick = $this->trickRepository->getTrick($request->attributes->get('id'));

            $trickDTO = $this->trickDTOFactory->create($trick);
            //dd($trickDTO);
            $form = $this->formFactory->create(UpdateTrickType::class, $trickDTO);
            if ($this->editTrickTypeHandler->handle($form)){
                return $responder($form, true);
            }
        } return $responder($form, false);
    }
}