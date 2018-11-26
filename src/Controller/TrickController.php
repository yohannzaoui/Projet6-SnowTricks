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
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class TrickController
 * @package App\Controller
 */
class TrickController extends AbstractController implements TrickControllerInterface
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
     * TrickController constructor.
     * @param TrickRepository $trickRepository
     * @param CommentHandlerInterface $commentHandler
     * @param CommentRepository $commentRepository
     */
    public function __construct(
        TrickRepository $trickRepository,
        CommentHandlerInterface $commentHandler,
        CommentRepository $commentRepository

    ) {
        $this->trickRepository = $trickRepository;
        $this->commentHandler = $commentHandler;
        $this->commentRepository = $commentRepository;
    }

    /**
     * @Route("/trick/{slug}", name="trick", methods={"GET", "POST"})
     * @Route("trick/comments/{page}/{slug}", name="comment_trick", methods={"GET","POST"})
     * @param Request $request
     * @param int $page
     * @return mixed|\Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function index(Request $request, $page = 1)
    {
        if (!$trick = $this->trickRepository->getTrickBySlug($request->attributes->get('slug'))) {
            throw new NotFoundHttpException();
        }

        $comments = $this->commentRepository->getComments($trick->getId(), $page, 5);

        $pagination = [
            'page' => $page,
            'route' => 'comment_trick',
            'pages_count' => ceil(count($comments) / 5),
            'route_params' => ['slug' => $trick->getSlug()]
        ];

        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment)
            ->handleRequest($request);

        $user = $this->getUser();

        if ($this->commentHandler->handle($form, $user, $trick, $comment)) {

            return $this->redirectToRoute('trick', [
                'slug' => $trick->getSlug()
            ]);
        }
        return $this->render('trick/index.html.twig', [
            'trick' => $trick,
            'comments' => $comments,
            'pagination' => $pagination,
            'form' => $form->createView()
        ]);
    }
}