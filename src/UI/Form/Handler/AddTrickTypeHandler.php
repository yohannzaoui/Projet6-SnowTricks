<?php

declare(strict_types=1);

namespace App\UI\Form\Handler;

use App\Domain\Builder\Interfaces\ImageBuilderInterface;
use App\Domain\Builder\Interfaces\VideoBuilderInterface;
use App\Domain\Builder\TrickBuilder;
use App\Domain\Repository\ImageRepository;
use App\Domain\Repository\TrickRepository;
use App\Domain\Repository\VideoRepository;
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
     * @var VideoRepository
     */
    private $videoRepository;

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
     * @param VideoRepository $videoRepository
     * @param TrickBuilder $trickBuilder
     * @param FileUploader $fileUploader
     * @param ImageBuilderInterface $imageBuilder
     * @param VideoBuilderInterface $videoBuilder
     */
    public function __construct(
        TrickRepository $trickRepository,
        ImageRepository $imageRepository,
        VideoRepository $videoRepository,
        TrickBuilder $trickBuilder,
        FileUploader $fileUploader,
        ImageBuilderInterface $imageBuilder,
        VideoBuilderInterface $videoBuilder

    ) {
        $this->trickRepository = $trickRepository;
        $this->imageRepository = $imageRepository;
        $this->videoRepository = $videoRepository;
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

            $imagesFiles = $form->getData()->images->files;

            //upload defaultImage
            $image = $this->fileUploader->upload(
                $form->getData()->defaultImage->file
            );

            //upload additional images
            foreach ($imagesFiles as $imageFile) {
                $newImage = $this->fileUploader->upload($imageFile);
                $uploadedImages[] = $this->imageBuilder->create($newImage);
            }

            $defaultImage = $this->imageBuilder->create($image);

            if (!\count($form->getData()->videos->urls) == 0) {

                $videos = $this->videoBuilder->createFromArray(
                    $form->getData()->videos->urls
                );
            }

            $this->trickBuilder->create(
                $form->getData()->author,
                $form->getData()->name,
                $form->getData()->description,
                $defaultImage,
                $uploadedImages ?? [],
                $videos ?? [],
                $form->getData()->category
            );

            $this->trickRepository->save($this->trickBuilder->getTrick());

            return true;
        }
        return false;
    }
}