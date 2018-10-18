<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 13/10/2018
 * Time: 18:12
 */

namespace App\UI\Action;

use App\UI\Action\Interfaces\AddTrickActionInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\UI\Form\TrickType;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Form\Handler\Interfaces\AddTrickTypeHandlerInterface;
use App\UI\Responder\Interfaces\AddTrickResponderInterface;

class AddTrickAction implements AddTrickActionInterface
{
    private $formFactory;

    private $addTrickTypeHandler;

    public function __construct(FormFactoryInterface $formFactory, AddTrickTypeHandlerInterface $addTrickTypeHandler)
    {
        $this->formFactory = $formFactory;
        $this->addTrickTypeHandler = $addTrickTypeHandler;
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/ajouterTrick", name="addtrick", methods={"GET","POST"})
     */
    public function __invoke(Request $request, AddTrickResponderInterface $responder)
    {
        $form = $this->formFactory->create(TrickType::class)->handleRequest($request);

        if ($this->addTrickTypeHandler->handle($form)) {
            return $responder(true, $form);
        }
        return $responder(false, $form);
    }

}