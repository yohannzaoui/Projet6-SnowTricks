<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 13/11/2018
 * Time: 11:53
 */

namespace App\FormHandler\Interfaces;

use App\Entity\Trick;
use App\Services\FileUploader;
use App\Repository\TrickRepository;
use Symfony\Component\Form\FormInterface;

/**
 * Interface EditTrickHandlerInterface
 * @package App\FormHandler\Interfaces
 */
interface EditTrickHandlerInterface
{
    /**
     * EditTrickHandlerInterface constructor.
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