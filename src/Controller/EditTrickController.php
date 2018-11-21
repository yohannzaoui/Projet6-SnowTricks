<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 09/11/2018
 * Time: 10:30
 */

namespace App\Controller;

use App\Controller\Interfaces\EditTrickControllerInterface;
use App\Entity\Trick;
use App\Form\EditTrickType;
use App\FormHandler\Interfaces\EditTrickHandlerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class EditTrickController
 * @package App\Controller
 */
final class EditTrickController extends AbstractController implements EditTrickControllerInterface
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
     * @Route("/edit/trick/{slug}", name="edittrick", methods={"GET", "POST"})
     */
    public function index(Request $request , Trick $trick)
    {

        $form = $this->createForm(EditTrickType::class, $trick)
            ->handleRequest($request);

        $user = $this->getUser();

        if ($this->editTrickHandler->handle($form, $user, $trick)) {

            return $this->redirectToRoute('trick', [
                'slug' => $request->attributes->get('slug')
            ]);
        }

        return $this->render('edit_trick/edit_trick.html.twig',[
            'form' => $form->createView(),
            'trick' => $trick
        ]);
    }
}