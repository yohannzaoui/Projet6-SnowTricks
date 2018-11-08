<?php

namespace App\UI\Form\Handler\Interfaces;

use App\Domain\Builder\ImageBuilder;
use App\Domain\Repository\ImageRepository;
use App\Services\FileUploader;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Interface ProfilTypeHandlerInterface
 * @package App\UI\Form\Handler\Interfaces
 */
interface ProfilTypeHandlerInterface
{

    public function __construct(
        FileUploader $fileUploader,
        ImageRepository $imageRepository,
        ImageBuilder $imageBuilder,
        SessionInterface $messageFlash
    );

    /**
     * @return mixed
     */
    public function handle(FormInterface $form);
}