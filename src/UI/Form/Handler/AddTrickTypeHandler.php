<?php

declare(strict_types=1);

namespace App\UI\Form\Handler;

use App\Domain\Builder\TrickBuilder;
use App\Domain\Repository\TrickRepository;
use Symfony\Component\Form\FormInterface;
use App\UI\Form\Handler\Interfaces\AddTrickTypeHandlerInterface;
use App\Services\FileUploader;


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

    /**
     * @var TrickBuilder
     */
    private $trickBuilder;

    /**
     * @var FileUploader
     */
    private $fileUploader;


    /**
     * AddTrickTypeHandler constructor.
     */
    public function __construct(
        TrickRepository $trickRepository,
        TrickBuilder $trickBuilder,
        FileUploader $fileUploader
    ) {
        $this->trickRepository = $trickRepository;
        $this->trickBuilder = $trickBuilder;
        $this->fileUploader = $fileUploader;
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
            //$file = $form->getData()->image;
            //$image = $this->fileUploader->upload($file);


            $this->trickBuilder->create(
                $form->getData()->name,
                $form->getData()->description,
                $form->getdata()->category
                //$form->getData()->image,
                //$form->getData()->video
            );


            $this->trickRepository->save($this->trickBuilder->getTrick());

            return true;
        }
        return false;
    }
    
}