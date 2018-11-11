<?php

declare(strict_types=1);

namespace App\FormHandler;


use App\FormHandler\Interfaces\ProfilTypeHandlerInterface;
use App\Repository\UserRepository;
use App\Services\Interfaces\FileRemoverInterface;
use App\Services\Interfaces\FileUploaderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


/**
 * Class ProfilTypeHandler
 * @package App\FormHandler
 */
class ProfilTypeHandler implements ProfilTypeHandlerInterface
{


    /**
     * @var FileUploaderInterface
     */
    private $fileUploader;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     * @var FileRemoverInterface
     */
    private $fileRemover;


    /**
     * ProfilTypeHandler constructor.
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
    ) {
        $this->fileUploader = $fileUploader;
        $this->messageFlash = $messageFlash;
        $this->userRepository = $userRepository;
        $this->fileRemover = $fileRemover;
    }


    /**
     * @param FormInterface $form
     * @param $iduser
     * @param $imageUser
     * @return bool
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function handle(FormInterface $form, $iduser, $imageUser)
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $fileRemove = $this->userRepository->checkProfilImage($imageUser);

            $this->fileRemover->deleteFile($fileRemove['profilImage']);

            $file = $form->getData()->getProfilImage();

            $profilImage = $this->fileUploader->upload($file);

            $this->userRepository->updateProfilImage($profilImage, $iduser);

            $this->messageFlash->getFlashBag()->add('profilUpdate',
                'Votre image de profil à bien été mis à jour');

            return true;
        }
        return false ;
    }

}