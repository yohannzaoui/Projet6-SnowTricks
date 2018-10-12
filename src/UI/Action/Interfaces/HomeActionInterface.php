<?php

namespace App\UI\Action\Interfaces;

use Doctrine\Common\Persistence\ObjectManager;
use App\UI\Responder\Interfaces\HomeResponderInterface;

interface HomeActionInterface
{
    public function __invoke(HomeResponderInterface $responder, ObjectManager $manager);
}