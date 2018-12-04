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
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class DeleteUserController
 * @package App\Controller
 */
class DeleteUserController implements DeleteUserControllerInterface
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
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var SessionInterface
     */
    private $messageFlash;


    /**
     * DeleteUserController constructor.
     * @param UserRepository $userRepository
     * @param FileRemover $fileRemover
     * @param TokenStorageInterface $tokenStorage
     * @param UrlGeneratorInterface $urlGenerator
     * @param SessionInterface $messageFlash
     */
    public function __construct(
        UserRepository $userRepository,
        FileRemover $fileRemover,
        TokenStorageInterface $tokenStorage,
        UrlGeneratorInterface $urlGenerator,
        SessionInterface $messageFlash
    ) {
        $this->userRepository = $userRepository;
        $this->fileRemover = $fileRemover;
        $this->tokenStorage = $tokenStorage;
        $this->urlGenerator = $urlGenerator;
        $this->messageFlash = $messageFlash;
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

            if (!is_null($this->tokenStorage->getToken()->getUser()->getProfilImage())) {

                $imageUser = $this->tokenStorage->getToken()->getUser()->getProfilImage();

                $fileRemove = $this->userRepository->checkProfilImage($imageUser);

                $this->fileRemover->deleteFile($fileRemove['profilImage']);
            }

            $this->userRepository->delete($request->attributes->get('id'));

            $this->messageFlash->getFlashBag()->add('deleteUser',
                'Compte utilisateur supprimé');

            return new RedirectResponse($this->urlGenerator->generate('allUsers'), 302);
        }
    }
}