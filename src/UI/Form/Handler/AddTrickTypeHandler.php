<?php

declare(strict_types=1);

namespace App\UI\Form\Handler;

use App\Domain\Builder\Interfaces\ImageBuilderInterface;
use App\Domain\Builder\Interfaces\VideoBuilderInterface;
use App\Domain\Builder\TrickBuilder;
use App\Domain\Repository\ImageRepository;
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
     * @var ImageRepository
     */
    private $imageRepository;

    /**
     * @var TrickBuilder
     */
    private $trickBuilder;

    /**
     * @var FileUploader
     */
    private $fileUploader;

    /**
     * @var ImageBuilderInterface
     */
    private $imageBuilder;

    /**
     * @var VideoBuilderInterface
     */
    private $videoBuilder;


    /**
     * AddTrickTypeHandler constructor.
     * @param TrickRepository $trickRepository
     * @param ImageRepository $imageRepository
     * @param TrickBuilder $trickBuilder
     * @param FileUploader $fileUploader
     * @param ImageBuilderInterface $imageBuilder
     * @param VideoBuilderInterface $videoBuilder
     */
    public function __construct(
        TrickRepository $trickRepository,
        ImageRepository $imageRepository,
        TrickBuilder $trickBuilder,
        FileUploader $fileUploader,
        ImageBuilderInterface $imageBuilder,
        VideoBuilderInterface $videoBuilder

    ) {
        $this->trickRepository = $trickRepository;
        $this->imageRepository = $imageRepository;
        $this->trickBuilder = $trickBuilder;
        $this->fileUploader = $fileUploader;
        $this->imageBuilder = $imageBuilder;
        $this->videoBuilder = $videoBuilder;
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

            $this->trickBuilder->create(
                $form->getData()->name,
                $form->getData()->description,

                $this->imageBuilder->create(
                    $this->fileUploader->upload(
                        $form->getData()->image->file)
                ),
                $this->videoBuilder->create(
                    $form->getData()->video->url
                ),
                $form->getdata()->category
            );

            $this->trickRepository->save($this->trickBuilder->getTrick());
            $this->imageRepository->save($this->imageBuilder->getImage());

            return true;
        }
        return false;
    }
    
}