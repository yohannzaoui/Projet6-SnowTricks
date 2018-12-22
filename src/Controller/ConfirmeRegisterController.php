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
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;


/**
 * Class ConfirmeRegisterController
 * @package App\Controller
 */
class ConfirmeRegisterController implements ConfirmeRegisterControllerInterface
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
     * @var Environment
     */
    private $twig;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;


    /**
     * ConfirmeRegisterController constructor.
     * @param UserRepository $userRepository
     * @param SessionInterface $messageFlash
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        UserRepository $userRepository,
        SessionInterface $messageFlash,
        Environment $twig,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->userRepository = $userRepository;
        $this->messageFlash = $messageFlash;
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
    }


    /**
     * @Route(path="/confirmeregister/{token}", name="confirme", methods={"GET"})
     * @param Request $request
     * @return mixed|RedirectResponse|Response
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index(Request $request)
    {
        if (!\is_null($user = $this->userRepository->checkRegistrationToken($request->get('token')))) {

            $user->setValidate(true);

            $this->userRepository->save($user);

            $this->messageFlash->getFlashBag()->add('confirmeRegister', 'Votre compte à bien été créer');

            return new RedirectResponse($this->urlGenerator->generate('login'),
                RedirectResponse::HTTP_FOUND);
        }

        return new Response($this->twig->render('error/register_validation_error.html.twig'),
            Response::HTTP_OK);
    }
}