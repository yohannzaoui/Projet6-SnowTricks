<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 14/10/2018
 * Time: 10:53
 */

namespace App\UI\Form\Handler\Interfaces;

use App\Domain\Repository\TrickRepository;
use App\Domain\Builder\TrickBuilder;
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
     * @param TrickBuilder $trickBuilder
     * @param FileUploader $fileUploader
     *
     */
    public function __construct(TrickRepository $trickRepository, TrickBuilder $trickBuilder, FileUploader $fileUploader);

    /**
     * @param FormInterface $form
     * @return mixed
     */
    public function handle(FormInterface $form);
}