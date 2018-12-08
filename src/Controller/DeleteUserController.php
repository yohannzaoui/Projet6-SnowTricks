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
use App\Services\Interfaces\FileRemoverInterface;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use App\Event\FileRemoverEvent;

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
     * @var FileRemoverInterface
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
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;


    /**
     * DeleteUserController constructor.
     * @param UserRepository $userRepository
     * @param FileRemoverInterface $fileRemover
     * @param TokenStorageInterface $tokenStorage
     * @param UrlGeneratorInterface $urlGenerator
     * @param SessionInterface $messageFlash
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(
        UserRepository $userRepository,
        FileRemoverInterface $fileRemover,
        TokenStorageInterface $tokenStorage,
        UrlGeneratorInterface $urlGenerator,
        SessionInterface $messageFlash,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->userRepository = $userRepository;
        $this->fileRemover = $fileRemover;
        $this->tokenStorage = $tokenStorage;
        $this->urlGenerator = $urlGenerator;
        $this->messageFlash = $messageFlash;
        $this->eventDispatcher = $eventDispatcher;

    }


    /**
     * @Route("/deleteUser/{id}", name="deleteUser", methods={"GET"})
     * @param Request $request
     * @return mixed|\Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function index(Request $request)
    {
        if ($request->get('id')) {

            $user = $this->userRepository->getUser($request->get('id'));

            if (!$user) {
                throw new NonUniqueResultException('Utilisateur inconnu');
            }

            if (!is_null($user->getProfileImage())) {

                $this->eventDispatcher->dispatch(
                    FileRemoverEvent::NAME,
                    new FileRemoverEvent($this->fileRemover, $user->getProfileImage()));
            }

            $this->userRepository->delete($user);

            $this->messageFlash->getFlashBag()->add('deleteUser',
                'Compte utilisateur supprimé');

            return new RedirectResponse($this->urlGenerator->generate('allUsers'), 302);
        }
    }
}