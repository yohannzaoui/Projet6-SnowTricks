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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * Class UsersController
 * @package App\Controller
 */
class UsersController implements UsersControllerInterface
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var Environment
     */
    private $twig;


    /**
     * UsersController constructor.
     * @param UserRepository $userRepository
     * @param Environment $twig
     */
    public function __construct(
        UserRepository $userRepository,
        Environment $twig
    ) {
        $this->userRepository = $userRepository;
        $this->twig = $twig;
    }


    /**
     * @Route("/allUsers", name="allUsers", methods={"GET"})
     * @IsGranted("ROLE_ADMIN")
     * @return mixed|Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index()
    {
        $users = $this->userRepository->getAllUsersForAdmin();

        return new Response($this->twig->render('admin/users.html.twig', [
            'users' => $users
        ]), 200);
    }
}