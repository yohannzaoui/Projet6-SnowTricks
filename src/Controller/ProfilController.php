<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 16:05
 */

namespace App\Controller;


use App\Controller\Interfaces\ProfilControllerInterface;
use App\Entity\User;
use App\Form\ImageProfilType;
use App\FormHandler\ProfilTypeHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class ProfilController
 * @package App\Controller
 */
class ProfilController extends AbstractController implements ProfilControllerInterface
{

    /**
     * @var profilTypeHandler
     */
    private $profilTypeHandler;

    /**
     * ProfilController constructor.
     * @param ProfilTypeHandler $profilTypeHandler
     */
    public function __construct(
        ProfilTypeHandler $profilTypeHandler
    ) {
        $this->profilTypeHandler = $profilTypeHandler;
    }


    /**
     * @Route("/profil", name="profil", methods={"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function index(Request $request)
    {

        $user = new User();

        $form = $this->createForm(ImageProfilType::class, $user)
            ->handleRequest($request);

        $iduser = $this->getUser()->getId();
        $imageUser = $this->getUser()->getProfilImage();

        if ($this->profilTypeHandler->handle($form, $iduser, $imageUser)) {

            return $this->redirectToRoute('profil');
        }

        return $this->render('profil/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}