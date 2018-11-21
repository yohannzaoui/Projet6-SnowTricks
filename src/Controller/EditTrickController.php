<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 09/11/2018
 * Time: 10:30
 */

namespace App\Controller;

use App\Entity\Trick;
use App\Form\EditTrickType;
use App\FormHandler\Interfaces\EditTrickHandlerInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class EditTrickController
 * @package App\Controller
 */
final class EditTrickController extends AbstractController
{

    /**
     * @var EditTrickHandlerInterface
     */
    private $editTrickHandler;

    /**
     * EditTrickController constructor.
     * @param EditTrickHandlerInterface $editTrickHandler
     */
    public function __construct(
        EditTrickHandlerInterface $editTrickHandler
    ) {
        $this->editTrickHandler = $editTrickHandler;
    }

    /**
     *
     * @param Request $request
     * @param Trick $trick
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/edit/trick/{id}", name="edittrick", methods={"GET", "POST"})
     */
    public function index(Request $request , Trick $trick)
    {

        /*$images = new ArrayCollection();

        foreach ($trick->getImages() as $image) {

            $images->add($image);
        }

        $videos = new ArrayCollection();

        foreach ($trick->getVideos() as $video) {

            $videos->add($video);
        }*/

        $form = $this->createForm(EditTrickType::class, $trick)
            ->handleRequest($request);

        $user = $this->getUser();

        /*if ($form->isSubmitted() && $form->isValid()) {

            foreach ($images as $image) {

                if (false === $trick->getImages()->contains($image)) {

                    $image->getTrick()->removeElement($trick);
                }
            }
        }*/

        if ($this->editTrickHandler->handle($form, $user, $trick)) {

            return $this->redirectToRoute('trick', [
                'id' => $request->attributes->get('id')
            ]);
        }

        return $this->render('edit_trick/edit_trick.html.twig',[
            'form' => $form->createView(),
            'trick' => $trick
        ]);
    }
}