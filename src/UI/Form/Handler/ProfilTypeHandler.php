<?php

declare(strict_types=1);

namespace App\UI\Form\Handler;


use App\Domain\Builder\MediaBuilder;
use App\Domain\Repository\MediaRepository;
use App\Services\FileUploader;
use App\UI\Form\Handler\Interfaces\ProfilTypeHandlerInterface;
use Symfony\Component\Form\FormInterface;


/**
 * Class ProfilTypeHandler
 * @package App\UI\Form\Handler
 */
class ProfilTypeHandler implements ProfilTypeHandlerInterface
{

    /**
     * @var FileUploader
     */
    private $fileUploader;
    /**
     * @var MediaRepository
     */
    private $mediaRepository;
    /**
     * @var MediaBuilder
     */
    private $mediaBuilder;

    /**
     * ProfilTypeHandler constructor.
     */
    public function __construct(FileUploader $fileUploader, MediaRepository $mediaRepository, MediaBuilder $mediaBuilder)
    {
        $this->fileUploader = $fileUploader;
        $this->mediaRepository = $mediaRepository;
        $this->mediaBuilder = $mediaBuilder;
    }


    /**
     * @param FormInterface $form
     * @return bool|mixed
     * @throws \Exception
     */
    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->getData()->file;
            $fileName = $this->fileUploader->upload($file);

            $this->mediaBuilder->create($fileName);


            $this->mediaRepository->save($this->mediaBuilder->getMedia());

        }
        return false;
    }

}