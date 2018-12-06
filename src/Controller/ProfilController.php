<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 16:05
 */

namespace App\Controller;


use App\Controller\Interfaces\ProfilControllerInterface;
use App\Entity\User;
use App\Form\ImageProfilType;
use App\FormHandler\ProfilTypeHandler;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Twig\Environment;


/**
 * Class ProfilController
 * @package App\Controller
 */
class ProfilController implements ProfilControllerInterface
{

    /**
     * @var profilTypeHandler
     */
    private $profilTypeHandler;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var Environment
     */
    private $twig;


    /**
     * ProfilController constructor.
     * @param ProfilTypeHandler $profilTypeHandler
     * @param FormFactoryInterface $formFactory
     * @param TokenStorageInterface $tokenStorage
     * @param UrlGeneratorInterface $urlGenerator
     * @param Environment $twig
     */
    public function __construct(
        ProfilTypeHandler $profilTypeHandler,
        FormFactoryInterface $formFactory,
        TokenStorageInterface $tokenStorage,
        UrlGeneratorInterface $urlGenerator,
        Environment $twig
    ) {
        $this->profilTypeHandler = $profilTypeHandler;
        $this->formFactory = $formFactory;
        $this->tokenStorage = $tokenStorage;
        $this->urlGenerator = $urlGenerator;
        $this->twig = $twig;
    }


    /**
     * @Route("/profil", name="profil", methods={"GET", "POST"})
     * @param Request $request
     * @return mixed|RedirectResponse|Response
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index(Request $request)
    {

        $user = new User();

        $form = $this->formFactory->create(ImageProfilType::class, $user)
            ->handleRequest($request);

        $idUser = $this->tokenStorage->getToken()->getUser()->getId();
        $imageUser = $this->tokenStorage->getToken()->getUser()->getProfilImage();

        if ($this->profilTypeHandler->handle($form, $idUser, $imageUser)) {

            return new RedirectResponse($this->urlGenerator->generate('profil'), 302);
        }

        return new Response($this->twig->render('profil/index.html.twig', [
            'form' => $form->createView(),
        ]), 200);
    }
}