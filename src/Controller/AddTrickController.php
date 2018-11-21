<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 15:11
 */

namespace App\Controller;

use App\Entity\Trick;
use App\Form\AddTrickType;
use App\FormHandler\AddTrickHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AddTrickController
 * @package App\Controller
 */
final class AddTrickController extends AbstractController
{

    /**
     * @var AddTrickHandler
     */
    private $addTrickHandler;

    /**
     * AddTrickController constructor.
     * @param AddTrickHandler $addTrickHandler
     */
    public function __construct(
        AddTrickHandler $addTrickHandler
    ) {
        $this->addTrickHandler = $addTrickHandler;
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

        $user = $this->getUser();

        if ($this->addTrickHandler->handle($form, $user, $trick)) {

            return $this->redirectToRoute('trick', [
                'slug' => $trick->getSlug()
            ]);
        }
        return $this->render('add_trick/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}