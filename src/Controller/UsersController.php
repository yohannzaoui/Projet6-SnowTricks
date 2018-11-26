<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 16:09
 */

namespace App\Controller;


use App\Controller\Interfaces\UsersControllerInterface;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UsersController
 * @package App\Controller
 */
class UsersController extends AbstractController implements UsersControllerInterface
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UsersController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * @Route("/allUsers", name="allUsers", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $users = $this->userRepository->getAllUsersForAdmin();


        return $this->render('admin/users.html.twig', [
            'users' => $users
        ]);
    }
}