<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 08/11/2018
 * Time: 10:40
 */

namespace App\FormHandler\Interfaces;

use App\Services\FileUploader;
use App\Repository\TrickRepository;
use Symfony\Component\Form\FormInterface;
use App\Entity\Trick;

/**
 * Interface AddTrickHandlerInterface
 * @package App\FormHandler\Interfaces
 */
interface AddTrickHandlerInterface
{
    /**
     * AddTrickHandlerInterface constructor.
     * @param FileUploader $fileUploader
     * @param TrickRepository $trickRepository
     */
    public function __construct(
        FileUploader $fileUploader,
        TrickRepository $trickRepository
    );

    /**
     * @param FormInterface $form
     * @param $user
     * @param Trick $trick
     * @return mixed
     */
    public function handle(FormInterface $form, $user, Trick $trick);
}