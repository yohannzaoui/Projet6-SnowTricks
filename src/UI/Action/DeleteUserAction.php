<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 25/10/2018
 * Time: 14:43
 */

namespace App\UI\Action;


use App\Domain\Repository\UserRepository;
use App\UI\Action\Interfaces\DeleteUserActionInterface;
use App\UI\Responder\Interfaces\DeleteUserActionResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class DeleteUserAction
 * @package App\UI\Action
 */
class DeleteUserAction implements DeleteUserActionInterface
{

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var Session
     */
    private $messageFlash;


    /**
     * DeleteUserAction constructor.
     * @param UserRepository $userRepository
     * @param Session $messageFlash
     */
    public function __construct(UserRepository $userRepository, SessionInterface $messageFlash)
    {
        $this->userRepository = $userRepository;
        $this->messageFlash = $messageFlash;
    }

    /**
     * @Route("/deleteUser/{id}", name="deleteUser", methods={"GET"})
     * @param Request $request
     * @param DeleteUserActionResponderInterface $responder
     * @return mixed
     */
    public function __invoke(Request $request, DeleteUserActionResponderInterface $responder)
    {
        if($request->attributes->get('id')){

            $this->userRepository->delete($request->attributes->get('id'));

            $this->messageFlash->getFlashBag()->add('deleteUser', 'Membre supprimé !');

            return $responder();
        }

    }

}