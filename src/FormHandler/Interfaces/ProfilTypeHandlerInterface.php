<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 08/11/2018
 * Time: 10:29
 */

namespace App\FormHandler\Interfaces;

use App\Services\Interfaces\FileUploaderInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\UserRepository;
use App\Services\Interfaces\FileRemoverInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Interfaces ProfilTypeHandlerInterface
 * @package App\FormHandler\Interfaces
 */
interface ProfilTypeHandlerInterface
{
    /**
     * ProfilTypeHandlerInterface constructor.
     * @param FileUploaderInterface $fileUploader
     * @param SessionInterface $messageFlash
     * @param UserRepository $userRepository
     * @param FileRemoverInterface $fileRemover
     */
    public function __construct(
        FileUploaderInterface $fileUploader,
        SessionInterface $messageFlash,
        UserRepository $userRepository,
        FileRemoverInterface $fileRemover
    );

    /**
     * @param FormInterface $form
     * @param $iduser
     * @param $imageUser
     * @return mixed
     */
    public function handle(FormInterface $form, $iduser, $imageUser);
}