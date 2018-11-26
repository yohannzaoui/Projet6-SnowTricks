<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 06/11/2018
 * Time: 15:35
 */

namespace App\Controller;


use App\Controller\Interfaces\DeleteUserControllerInterface;
use App\Repository\UserRepository;
use App\Services\FileRemover;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DeleteUserController
 * @package App\Controller
 */
class DeleteUserController extends AbstractController implements DeleteUserControllerInterface
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var FileRemover
     */
    private $fileRemover;


    /**
     * DeleteUserController constructor.
     * @param UserRepository $userRepository
     * @param FileRemover $fileRemover
     */
    public function __construct(
        UserRepository $userRepository,
        FileRemover $fileRemover
    ) {
        $this->userRepository = $userRepository;
        $this->fileRemover = $fileRemover;
    }


    /**
     * @Route("/deleteUser/{id}", name="deleteUser", methods={"GET"})
     * @param Request $request
     * @return mixed|\Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function index(Request $request)
    {
        if ($request->attributes->get('id')) {

            $imageUser = $this->getUser()->getProfilImage();
            $fileRemove = $this->userRepository->checkProfilImage($imageUser);
            $this->fileRemover->deleteFile($fileRemove['profilImage']);

            $this->userRepository->delete($request->attributes->get('id'));

            $this->addFlash('deleteUser',
                'Compte utilisateur supprimé');

            return $this->redirectToRoute('allUsers');
        }
    }
}