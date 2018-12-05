<?php


namespace App\FormHandler;


use App\FormHandler\Interfaces\ProfilTypeHandlerInterface;
use App\Repository\UserRepository;
use App\Services\Interfaces\FileRemoverInterface;
use App\Services\Interfaces\FileUploaderInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Event\FileRemoverEvent;


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
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;


    /**
     * ProfilTypeHandler constructor.
     * @param FileUploaderInterface $fileUploader
     * @param SessionInterface $messageFlash
     * @param UserRepository $userRepository
     * @param FileRemoverInterface $fileRemover
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(
        FileUploaderInterface $fileUploader,
        SessionInterface $messageFlash,
        UserRepository $userRepository,
        FileRemoverInterface $fileRemover,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->fileUploader = $fileUploader;
        $this->messageFlash = $messageFlash;
        $this->userRepository = $userRepository;
        $this->eventDispatcher = $eventDispatcher;
        $this->fileRemover = $fileRemover;
    }


    /**
     * @param FormInterface $form
     * @param $idUser
     * @param $imageUser
     * @return bool
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function handle(FormInterface $form, $idUser, $imageUser)
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $fileRemove = $this->userRepository->checkProfilImage($imageUser);

            $this->eventDispatcher->dispatch(
                FileRemoverEvent::NAME,
                new FileRemoverEvent($this->fileRemover, $fileRemove['profilImage'])
            );

            $file = $form->getData()->getProfilImage();

            $profilImage = $this->fileUploader->upload($file);

            $this->userRepository->updateProfilImage($profilImage, $idUser);

            $this->messageFlash->getFlashBag()->add('profilUpdate',
                'Votre image de profil à bien été mis à jour');

            return true;
        }
        return false ;
    }

}