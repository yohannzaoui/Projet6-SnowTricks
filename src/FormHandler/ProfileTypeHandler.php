<?php


namespace App\FormHandler;


use App\FormHandler\Interfaces\ProfileTypeHandlerInterface;
use App\Repository\UserRepository;
use App\Services\Interfaces\FileRemoverInterface;
use App\Services\Interfaces\FileUploaderInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Event\FileRemoverEvent;


/**
 * Class ProfileTypeHandler
 * @package App\FormHandler
 */
class ProfileTypeHandler implements ProfileTypeHandlerInterface
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
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;


    /**
     * ProfilTypeHandler constructor.
     * @param FileUploaderInterface $fileUploader
     * @param SessionInterface $messageFlash
     * @param UserRepository $userRepository
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(
        FileUploaderInterface $fileUploader,
        SessionInterface $messageFlash,
        UserRepository $userRepository,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->fileUploader = $fileUploader;
        $this->messageFlash = $messageFlash;
        $this->userRepository = $userRepository;
        $this->eventDispatcher = $eventDispatcher;
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

            $fileRemove = $this->userRepository->checkProfileImage($imageUser);

            $this->eventDispatcher->dispatch(
                FileRemoverEvent::NAME,
                new FileRemoverEvent($fileRemove['profileImage'])
            );

            $file = $form->getData()->getProfileImage();

            $profileImage = $this->fileUploader->upload($file);

            $this->userRepository->updateProfileImage($profileImage, $idUser);

            $this->messageFlash->getFlashBag()->add('profileUpdate',
                'Votre image de profil à bien été mis à jour');

            return true;
        }
        return false ;
    }

}