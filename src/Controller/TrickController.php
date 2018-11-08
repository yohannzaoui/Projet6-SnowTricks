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
use App\Entity\Trick;
use App\Form\AddCommentType;
use App\Repository\TrickRepository;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

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
     * @var ObjectManager
     */
    private $manager;

    /**
     * TrickController constructor.
     * @param TrickRepository $trickRepository
     * @param ObjectManager $manager
     */
    public function __construct(
        TrickRepository $trickRepository,
        ObjectManager $manager

    ) {
        $this->trickRepository = $trickRepository;
        $this->manager = $manager;
    }

    /**
     * @Route("/trick/{id}", name="trick", methods={"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $trick = $this->getDoctrine()
            ->getRepository(Trick::class)
            ->find($request->attributes->get('id'));

        $comment = new Comment();
        $form = $this->createForm(AddCommentType::class, $comment)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $comment->setPseudo($form->getData()->getPseudo());
            $comment->setMessage($form->getData()->getMessage());
            $comment->setTrick($trick);

            $this->manager->persist($comment);
            $this->manager->flush();

            return $this->redirectToRoute('trick', [
                'id' => $trick->getId()
            ]);
        }
        return $this->render('trick/index.html.twig', [
            'trick' => $trick,
            'form' => $form->createView()
        ]);
    }
}