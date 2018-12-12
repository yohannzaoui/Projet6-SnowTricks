<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 09/11/2018
 * Time: 10:30
 */

namespace App\Controller;

use App\Controller\Interfaces\EditTrickControllerInterface;
use App\Form\EditTrickType;
use App\FormHandler\Interfaces\EditTrickHandlerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Repository\TrickRepository;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Twig\Environment;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class EditTrickController
 * @package App\Controller
 */
class EditTrickController implements EditTrickControllerInterface
{

    /**
     * @var EditTrickHandlerInterface
     */
    private $editTrickHandler;

    /**
     * @var TrickRepository
     */
    private $trickRepository;

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
     * EditTrickController constructor.
     * @param EditTrickHandlerInterface $editTrickHandler
     * @param TrickRepository $trickRepository
     * @param FormFactoryInterface $formFactory
     * @param TokenStorageInterface $tokenStorage
     * @param UrlGeneratorInterface $urlGenerator
     * @param Environment $twig
     */
    public function __construct(
        EditTrickHandlerInterface $editTrickHandler,
        TrickRepository $trickRepository,
        FormFactoryInterface $formFactory,
        TokenStorageInterface $tokenStorage,
        UrlGeneratorInterface $urlGenerator,
        Environment $twig
    ) {
        $this->editTrickHandler = $editTrickHandler;
        $this->trickRepository = $trickRepository;
        $this->formFactory = $formFactory;
        $this->tokenStorage = $tokenStorage;
        $this->urlGenerator = $urlGenerator;
        $this->twig = $twig;
    }

    /**
     * @Route("/edit/trick/{slug}", name="edittrick", methods={"GET", "POST"})
     * @IsGranted("ROLE_USER")
     * @param Request $request
     * @return mixed|RedirectResponse|Response
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index(Request $request)
    {
        if (null === $trick = $this->trickRepository->getTrickBySlug($request->get('slug'))) {

            throw new NotFoundHttpException('Pas de Trick avec ce nom ');
        }

        $form = $this->formFactory->create(EditTrickType::class, $trick)
            ->handleRequest($request);

        $author = $this->tokenStorage->getToken()->getUser();

        if ($this->editTrickHandler->handle($form, $author, $trick)) {

            return new RedirectResponse($this->urlGenerator->generate('trick', [
                'slug' => $trick->getSlug()
            ]), 302);

        }

        return new Response($this->twig->render('edit_trick/edit_trick.html.twig', [
            'form' => $form->createView(),
            'trick' => $trick
        ]), 200);

    }
}