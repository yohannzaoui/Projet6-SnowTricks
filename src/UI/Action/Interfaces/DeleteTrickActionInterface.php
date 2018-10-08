<?php

namespace App\UI\Action\Interfaces;

use App\UI\Responder\DeleteTrickResponder;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\UI\Action\Interfaces\DeleteTrickActionInterface;

interface DeleteTrickActionInterface
{
    public function __invoke(ObjectManager $manager,Request $request, DeleteTrickResponder $responder);
    
}