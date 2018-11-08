<?php

declare(strict_types=1);

namespace App\FormHandler;


use App\Repository\UserRepository;
use App\Services\FileUploader;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;



/**
 * Class ProfilTypeHandler
 * @package App\UI\Form\Handler
 */
class ProfilTypeHandler
{

    /**
     * @var FileUploader
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
     * ProfilTypeHandler constructor.
     * @param FileUploader $fileUploader
     * @param SessionInterface $messageFlash
     * @param UserRepository $userRepository
     */
    public function __construct(
        FileUploader $fileUploader,
        SessionInterface $messageFlash,
        UserRepository $userRepository
    ) {
        $this->fileUploader = $fileUploader;
        $this->messageFlash = $messageFlash;
        $this->userRepository = $userRepository;
    }


    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form, $iduser)
    {
        if ($form->isSubmitted() && $form->isValid()) {



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