<?php

namespace App\UI\Form\Handler;

use App\Domain\Builder\TrickBuilder;
use App\Domain\Repository\TrickRepository;
use Symfony\Component\Form\FormInterface;
use App\UI\Form\Handler\Interfaces\AddTrickTypeHandlerInterface;


/**
 * Class AddTrickTypeHandler
 * @package App\UI\Form\Handler
 */
class AddTrickTypeHandler implements AddTrickTypeHandlerInterface
{
    /**
     *
     */
    private $trickRepository;

    private $trickBuilder;

    /**
     * AddTrickTypeHandler constructor.
     */
    public function __construct(TrickRepository $trickRepository, TrickBuilder $trickBuilder)
    {
        $this->trickRepository = $trickRepository;
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

            $this->trickRepository->save($this->trickBuilder->getTrick());

            return true;
        }
        return false;
    }
    
}