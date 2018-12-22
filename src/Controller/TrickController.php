<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 14:29
 */

namespace App\Controller;

use App\Controller\Interfaces\TrickControllerInterface;
use App\Entity\Comment;
use App\Form\CommentType;
use App\FormHandler\Interfaces\CommentHandlerInterface;
use App\Repository\CommentRepository;
use App\Repository\TrickRepository;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Twig\Environment;

/**
 * Class TrickController
 * @package App\Controller
 */
class TrickController implements TrickControllerInterface
{
    /**
     * @var TrickRepository
     */
    private $trickRepository;

    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * @var CommentHandlerInterface
     */
    private $commentHandler;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var Environment
     */
    private $twig;


    /**
     * TrickController constructor.
     * @param TrickRepository $trickRepository
     * @param CommentHandlerInterface $commentHandler
     * @param CommentRepository $commentRepository
     * @param FormFactoryInterface $formFactory
     * @param UrlGeneratorInterface $urlGenerator
     * @param TokenStorageInterface $tokenStorage
     * @param Environment $twig
     */
    public function __construct(
        TrickRepository $trickRepository,
        CommentHandlerInterface $commentHandler,
        CommentRepository $commentRepository,
        FormFactoryInterface $formFactory,
        UrlGeneratorInterface $urlGenerator,
        TokenStorageInterface $tokenStorage,
        Environment $twig

    ) {
        $this->trickRepository = $trickRepository;
        $this->commentHandler = $commentHandler;
        $this->commentRepository = $commentRepository;
        $this->formFactory = $formFactory;
        $this->urlGenerator = $urlGenerator;
        $this->tokenStorage = $tokenStorage;
        $this->twig = $twig;
    }

    /**
     * @Route(path="/trick/{slug}", name="trick", methods={"GET", "POST"})
     * @Route(path="trick/comments/{page<\d+>}/{slug}", name="comment_trick", methods={"GET","POST"})
     * @param Request $request
     * @param int $page
     * @return mixed|RedirectResponse|Response
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index(Request $request, $page = 1)
    {
        if (!$trick = $this->trickRepository->getTrickBySlug($request->get('slug'))) {

            throw new NotFoundHttpException('Pas de Trick avec ce nom ');
        }

        $comments = $this->commentRepository->getComments($trick->getId(), $page, 5);

        $pagination = [
            'page' => $page,
            'route' => 'comment_trick',
            'pages_count' => ceil(count($comments) / 5),
            'route_params' => ['slug' => $trick->getSlug()]
        ];

        $comment = new Comment();
        $form = $this->formFactory->create(CommentType::class, $comment)
            ->handleRequest($request);

        $user = $this->tokenStorage->getToken()->getUser();

        if ($this->commentHandler->handle($form, $user, $trick, $comment)) {

            return new RedirectResponse($this->urlGenerator->generate('trick', [
                'slug' => $trick->getSlug()
            ]), RedirectResponse::HTTP_FOUND);

        }
        return new Response($this->twig->render('trick/index.html.twig', [
            'trick' => $trick,
            'comments' => $comments,
            'pagination' => $pagination,
            'form' => $form->createView()
        ]), Response::HTTP_OK);

    }
}