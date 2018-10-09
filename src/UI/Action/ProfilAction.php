<?php

namespace App\UI\Action;

use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Form\Handler\Interfaces\ProfilTypeHandlerInterface;


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

    public function __invoke()
    {
        
    }
}