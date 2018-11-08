<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 15:11
 */

namespace App\Controller;

use App\Entity\Trick;
use App\Form\AddTrickType\AddTrickType;
use App\FormHandler\AddTrickHandler;
use App\Services\Interfaces\FileUploaderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AddTrickController extends AbstractController
{

    private $fileUploader;

    private $AddTrickHandler;

    private $manager;

    public function __construct(
        FileUploaderInterface $fileUploader,
        AddTrickHandler $AddTrickHandler,
        ObjectManager $manager
    ) {
        $this->fileUploader = $fileUploader;
        $this->AddTrickHandler = $AddTrickHandler;
        $this->manager = $manager;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     * @IsGranted("ROLE_USER")
     * @Route("/ajouterTrick", name="addtrick", methods={"GET","POST"})
     */
    public function index(Request $request)
    {
        $trick = new Trick();

        $form = $this->createForm(AddTrickType::class, $trick)
            ->handleRequest($request);

        if ($this->AddTrickHandler->handle($form)) {



            return $this->redirectToRoute('trick',[
                'id' => $trick->getId()
            ]);
        }
        return $this->render('add_trick/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edittrick", methods={"GET", "POST"})
     */
    public function editTrick()
    {

    }

    /**
     * @Route("/delete/{id}", name="deltrick", methods={"GET"})
     */
    public function deleteTrick()
    {

    }
}