<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 09/11/2018
 * Time: 10:30
 */

namespace App\Controller;

use App\Entity\Trick;
use App\Form\EditTrickType\EditTrickType;
use Doctrine\Common\Persistence\ObjectManager;
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
     * @Route("/edit/trick/{id}", name="edittrick", methods={"GET", "POST"})
     * @param Request $request
     * @param Trick $trick
     * @param ObjectManager $manager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request , Trick $trick, ObjectManager $manager)
    {
        $form = $this->createForm(EditTrickType::class, $trick)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->flush();
        }

        return $this->render('edit_trick/edit_trick.html.twig',[
            'form' => $form->createView()
        ]);
    }
}