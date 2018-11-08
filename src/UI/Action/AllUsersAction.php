<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 25/10/2018
 * Time: 13:51
 */

namespace App\UI\Action;


use App\Domain\Repository\UserRepository;
use App\UI\Responder\Interfaces\AllUsersActionResponderInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AllUsersAction
 * @package App\UI\Action
 */
class AllUsersAction
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * AllUsersAction constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/allUsers", name="allUsers", methods={"GET"})
     * @param AllUsersActionResponderInterface $responder
     * @return mixed
     */
    public function __invoke(AllUsersActionResponderInterface $responder)
    {
        $users = $this->userRepository->getAllUsersForAdmin();

        return $responder($users);
    }
}