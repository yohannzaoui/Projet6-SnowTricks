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
     * @var CommentHandlerInterface
     */
    private $commentHandler;

    /**
     * TrickController constructor.
     * @param TrickRepository $trickRepository
     * @param CommentHandlerInterface $commentHandler
     */
    public function __construct(
        TrickRepository $trickRepository,
        CommentHandlerInterface $commentHandler

    ) {
        $this->trickRepository = $trickRepository;
        $this->commentHandler = $commentHandler;
    }

    /**
     * @Route("/trick/{slug}", name="trick", methods={"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function index(Request $request)
    {
        if (!$trick = $this->trickRepository->getTrickBySlug($request->attributes->get('slug'))) {
            throw new NotFoundHttpException();
        }


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
            'form' => $form->createView()
        ]);
    }
}