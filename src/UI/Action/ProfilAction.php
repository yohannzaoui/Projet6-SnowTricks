<?php

namespace App\UI\Action;

use App\UI\Responder\Interfaces\ProfilActionResponderInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Form\Handler\Interfaces\ProfilTypeHandlerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\UI\Form\ProfilType;


class ProfilAction
{

    private $formFactory;
    private $profilTypeHandler;


    public function __construct(FormFactoryInterface $formFactory,
        ProfilTypeHandlerInterface $profilTypeHandler
    ) {
        $this->formFactory = $formFactory;
        $this->profilTypeHandler = $profilTypeHandler;
    }

    /**
     * @Route("/monprofil", name="profil", methods={"GET","POST"})
     */
    public function __invoke(Request $request, ProfilActionResponderInterface $responder)
    {
        $form = $this->formFactory->create(ProfilType::class)->handleRequest($request);

        if ($this->profilTypeHandler->handle($form)){
            return $responder(true, $form);
        }
        return $responder(false, $form);

    }
}