<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 08/11/2018
 * Time: 10:40
 */

namespace App\FormHandler\Interfaces;

use App\Repository\Interfaces\TrickRepositoryInterface;
use App\Services\Interfaces\FileUploaderInterface;
use Symfony\Component\Form\FormInterface;
use App\Services\Interfaces\SluggerInterface;
use App\Entity\Trick;

/**
 * Interfaces AddTrickHandlerInterface
 * @package App\FormHandler\Interfaces
 */
interface AddTrickHandlerInterface
{
    /**
     * AddTrickHandlerInterface constructor.
     * @param FileUploaderInterface $fileUploader
     * @param TrickRepositoryInterface $trickRepository
     * @param SluggerInterface $slugger
     */
    public function __construct(
        FileUploaderInterface $fileUploader,
        TrickRepositoryInterface $trickRepository,
        SluggerInterface $slugger
    );

    /**
     * @param Trick $trick
     * @param $author
     * @param FormInterface $form
     * @return mixed
     */
    public function handle(Trick $trick, $author, FormInterface $form);
}