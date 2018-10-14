<?php

namespace App\UI\Form\Handler\Interfaces;

use App\Domain\Repository\MediaRepository;
use App\Services\FileUploader;
use Symfony\Component\Form\FormInterface;
use App\Domain\Builder\MediaBuilder;

/**
 * Interface ProfilTypeHandlerInterface
 * @package App\UI\Form\Handler\Interfaces
 */
interface ProfilTypeHandlerInterface
{
    /**
     * ProfilTypeHandlerInterface constructor.
     */
    public function __construct(FileUploader $fileUploader, MediaRepository $mediaRepository, MediaBuilder $mediaBuilder);

    /**
     * @return mixed
     */
    public function handle(FormInterface $form);
}