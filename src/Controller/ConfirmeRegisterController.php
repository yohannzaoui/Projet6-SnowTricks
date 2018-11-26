<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 14:44
 */

namespace App\Controller;


use App\Controller\Interfaces\ConfirmeRegisterControllerInterface;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ConfirmeRegisterController
 * @package App\Controller
 */
class ConfirmeRegisterController extends AbstractController implements ConfirmeRegisterControllerInterface
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * ConfirmeRegisterController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * @Route("/confirmeregister/{token}", name="confirme", methods={"GET"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function index(Request $request)
    {
        if (!\is_null($user = $this->userRepository->checkRegistrationToken($request->attributes->get('token')))) {

            $user->setValidate(true);

            $this->userRepository->save($user);

            $this->addFlash('confirmeRegister', 'Votre compte à bien été créer');

            return $this->redirectToRoute('login');
        }
        return $this->render('error/register_validation_error.html.twig');
    }
}