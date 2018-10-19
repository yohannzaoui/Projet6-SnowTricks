<?php


namespace App\UI\Action;

use App\Domain\Repository\UserRepository;
use App\UI\Action\Interfaces\ConfirmeRegisterActionInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\UI\Responder\Interfaces\ConfirmeRegisterActionResponderInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

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
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     * ConfirmeRegisterAction constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(
        UserRepository $userRepository,
        SessionInterface $messageFlash
) {
        $this->userRepository = $userRepository;
        $this->messageFlash = $messageFlash;
    }


    /**
     * @Route("/confirmeregister/{token}", name="confirme", methods={"GET"})
     * @param Request $request
     * @param ConfirmeRegisterActionResponderInterface $responder
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function __invoke(Request $request, ConfirmeRegisterActionResponderInterface $responder)
    {

        if (!\is_null($user = $this->userRepository->checkRegistrationToken($request->attributes->get('token')))) {


            $user->setValidate(true);

            $this->userRepository->save($user);

            $this->messageFlash->getFlashBag()->add('confirmeRegister', 'Votre à bien été créer');

            return $responder(true);
        }
        return $responder(false);
    }
}