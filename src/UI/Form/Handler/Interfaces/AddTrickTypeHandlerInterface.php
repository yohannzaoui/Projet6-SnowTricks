<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 14/10/2018
 * Time: 10:53
 */

namespace App\UI\Form\Handler\Interfaces;

use App\Domain\Builder\DefaultImageBuilder;
use App\Domain\Builder\Interfaces\ImageBuilderInterface;
use App\Domain\Builder\Interfaces\VideoBuilderInterface;
use App\Domain\Repository\ImageRepository;
use App\Domain\Repository\TrickRepository;
use App\Domain\Builder\TrickBuilder;
use App\Domain\Repository\VideoRepository;
use Symfony\Component\Form\FormInterface;
use App\Services\FileUploader;


/**
 * Interface AddTrickTypeHandlerInterface
 * @package App\UI\Form\Handler\Interfaces
 */
interface AddTrickTypeHandlerInterface
{


    /**
     * AddTrickTypeHandlerInterface constructor.
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
    );

    /**
     * @param FormInterface $form
     * @return mixed
     */
    public function handle(FormInterface $form);
}