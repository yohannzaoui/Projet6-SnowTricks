<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 17/11/2018
 * Time: 21:10
 */

namespace App\Controller;


use App\Controller\Interfaces\DeleteProfileImageControllerInterface;
use App\Repository\UserRepository;
use App\Services\FileRemover;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class DeleteProfileImageController
 * @package App\Controller
 */
class DeleteProfileImageController implements DeleteProfileImageControllerInterface
{

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var FileRemover
     */
    private $fileRemover;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * DeleteProfileImageController constructor.
     * @param TokenStorageInterface $tokenStorage
     * @param SessionInterface $messageFlash
     * @param UserRepository $userRepository
     * @param FileRemover $fileRemover
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        TokenStorageInterface $tokenStorage,
        SessionInterface $messageFlash,
        UserRepository $userRepository,
        FileRemover $fileRemover,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->tokenStorage = $tokenStorage;
        $this->messageFlash = $messageFlash;
        $this->userRepository = $userRepository;
        $this->fileRemover = $fileRemover;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @Route(path="/deleteProfileImage", name="deleteProfileImage", methods={"GET"})
     * @IsGranted("ROLE_USER")
     * @return mixed|RedirectResponse
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function index()
    {
        $profileImage = $this->tokenStorage->getToken()->getUser()->getProfileImage();

        $this->fileRemover->deleteFile($profileImage);

        $this->tokenStorage->getToken()->getUser()->setProfileImage(null);

        $this->userRepository->update();

        $this->messageFlash->getFlashBag()->add('deleteProfileImage', 'Image de profile supprimée');

        return new RedirectResponse($this->urlGenerator->generate('profil'),
            RedirectResponse::HTTP_FOUND);

    }
}