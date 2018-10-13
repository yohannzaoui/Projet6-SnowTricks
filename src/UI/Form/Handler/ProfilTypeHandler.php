<?php

namespace App\UI\Form\Handler;


use App\UI\Form\Handler\Interfaces\ProfilTypeHandlerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormInterface;


/**
 * Class ProfilTypeHandler
 * @package App\UI\Form\Handler
 */
class ProfilTypeHandler implements ProfilTypeHandlerInterface
{
    private $manager;
    private $fileUploader;

    /**
     * ProfilTypeHandler constructor.
     */
    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     *
     */
    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()) {





            return true;
        }
        return false;
    }

}