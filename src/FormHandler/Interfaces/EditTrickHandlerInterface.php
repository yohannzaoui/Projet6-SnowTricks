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
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormInterface;
use App\Services\Interfaces\SluggerInterface;

/**
 * Interfaces EditTrickHandlerInterface
 * @package App\FormHandler\Interfaces
 */
interface EditTrickHandlerInterface
{
    /**
     * EditTrickHandlerInterface constructor.
     * @param FileUploader $fileUploader
     * @param TrickRepository $trickRepository
     * @param SluggerInterface $slugger
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(
        FileUploader $fileUploader,
        TrickRepository $trickRepository,
        SluggerInterface $slugger,
        EventDispatcherInterface $eventDispatcher
    );

    /**
     * @param FormInterface $form
     * @param $user
     * @param Trick $trick
     * @return mixed
     */
    public function handle(FormInterface $form, $user, $trick);
}