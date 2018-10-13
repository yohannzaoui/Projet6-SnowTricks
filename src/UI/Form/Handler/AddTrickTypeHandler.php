<?php

namespace App\UI\Form\Handler;

use App\Domain\Models\Trick;
use App\Domain\Builder\TrickBuilder;
use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\UI\Form\Handler\Interfaces\AddTrickTypeHandlerInterface;


/**
 * Class AddTrickTypeHandler
 * @package App\UI\Form\Handler
 */
class AddTrickTypeHandler implements AddTrickTypeHandlerInterface
{
    /**
     * @var ObjectManager
     */
    private $manager;

    private $trickBuilder;

    /**
     * AddTrickTypeHandler constructor.
     * @param ObjectManager $manager
     */
    public function __construct(ObjectManager $manager, TrickBuilder $trickBuilder)
    {
        $this->manager = $manager;
        $this->trickBuilder = $trickBuilder;
    }


    /**
     * @param FormInterface $form
     * @param $trick
     * @return bool|mixed
     * @throws \Exception
     */
    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $this->trickBuilder->create($form->getData()->name,
                $form->getData()->description,
                $form->getData()->image,
                $form->getData()->video
            );

            $trick = $this->trickBuilder->getTrick();

            $this->manager->persist($trick);
            $this->manager->flush();
            return true;
        }
        return false;
    }
    
}