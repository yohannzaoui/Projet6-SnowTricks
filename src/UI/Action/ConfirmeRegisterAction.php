<?php


namespace App\UI\Action;

use App\Domain\Repository\UserRepository;
use App\UI\Action\Interfaces\ConfirmeRegisterActionInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\UI\Responder\Interfaces\ConfirmeRegisterActionResponderInterface;

/**
 * Class ConfirmeRegisterAction
 * @package App\UI\Action
 */
class ConfirmeRegisterAction implements ConfirmeRegisterActionInterface
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * ConfirmeRegisterAction constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * @Route("/confirmeregister/{token}", name="confirme", methods={"GET"})
     * @param Request $request
     * @param ConfirmeRegisterActionResponderInterface $responder
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function __invoke(Request $request, ConfirmeRegisterActionResponderInterface $responder)
    {
        if ($this->userRepository->checkRegistrationToken($request->get('token'))) {

            return $responder(true);
        }
        return $responder(false);
    }
}