<?php

declare(strict_types=1);

namespace App\UI\Form\Handler;


use App\Domain\Builder\ImageBuilder;
use App\Domain\Repository\ImageRepository;
use App\Services\FileUploader;
use App\UI\Form\Handler\Interfaces\ProfilTypeHandlerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;



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
     * @var ImageRepository
     */
    private $imageRepository;
    /**
     * @var ImageBuilder
     */
    private $imageBuilder;

    /**
     * @var SessionInterface
     */
    private $messageFlash;


    /**
     * ProfilTypeHandler constructor.
     * @param FileUploader $fileUploader
     * @param ImageRepository $imageRepository
     * @param ImageBuilder $imageBuilder
     * @param SessionInterface $messageFlash
     */
    public function __construct(
        FileUploader $fileUploader,
        ImageRepository $imageRepository,
        ImageBuilder $imageBuilder,
        SessionInterface $messageFlash
    ) {
        $this->fileUploader = $fileUploader;
        $this->imageRepository = $imageRepository;
        $this->imageBuilder = $imageBuilder;
        $this->messageFlash = $messageFlash;
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

            $image = $this->fileUploader->upload($file);

            $this->imageBuilder->create($image);

            $this->imageRepository->save($this->imageBuilder->getImage());

            $this->messageFlash->getFlashBag()->add('profilUpdate','Votre image de profil à bien été mis à jour');
        }
        return false;
    }

}