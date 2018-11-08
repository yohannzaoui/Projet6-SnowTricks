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
     * DeleteUserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * @Route("/deleteUser/{id}", name="deleteUser", methods={"GET"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function index(Request $request)
    {
        if ($request->attributes->get('id')) {

            $this->userRepository->delete($request->attributes->get('id'));

            $this->addFlash('deleteUser',
                'Compte utilisateur supprimé');

            return $this->redirectToRoute('allUsers');
        }
    }
}