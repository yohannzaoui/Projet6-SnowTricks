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
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DeleteProfileImageController
 * @package App\Controller
 */
final class DeleteProfileImageController extends AbstractController implements DeleteProfileImageControllerInterface
{
    /**
     * @Route("/deleteProfileImage", name="deleteProfileImage", methods={"GET"})
     * @param UserRepository $userRepository
     * @param FileRemover $fileRemover
     * @return mixed|\Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function index(UserRepository $userRepository, FileRemover $fileRemover)
    {
        $user = $this->getUser();

        $profileImage = $user->getProfilImage();

        $fileRemover->deleteFile($profileImage);

        $user->setProfilImage(null);

        $userRepository->update();

        $this->addFlash('deleteProfileImage', 'Image de profile supprimée');

        return $this->redirectToRoute('profil');

    }
}