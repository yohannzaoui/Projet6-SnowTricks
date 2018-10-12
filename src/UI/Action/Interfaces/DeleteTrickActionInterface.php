<?php

namespace App\UI\Action\Interfaces;

use App\UI\Responder\DeleteTrickResponder;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Interface DeleteTrickActionInterface
 * @package App\UI\Action\Interfaces
 */
interface DeleteTrickActionInterface
{
    /**
     * @param ObjectManager $manager
     * @param Request $request
     * @param DeleteTrickResponder $responder
     * @return mixed
     */
    public function __invoke(ObjectManager $manager, Request $request, DeleteTrickResponder $responder);
    
}