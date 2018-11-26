<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 14:41
 */

namespace App\Controller;


use App\Controller\Interfaces\ForgotPasswordControllerInterface;
use App\Entity\User;
use App\Form\ForgotPasswordType;
use App\FormHandler\ForgotPasswordHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ForgotPasswordController
 * @package App\Controller
 */
class ForgotPasswordController extends AbstractController implements ForgotPasswordControllerInterface
{
    /**
     * @var ForgotPasswordHandler
     */
    private $forgotPasswordHandler;

    /**
     * ForgotPasswordController constructor.
     * @param ForgotPasswordHandler $forgotPasswordHandler
     */
    public function __construct(
        ForgotPasswordHandler $forgotPasswordHandler
    ) {
        $this->forgotPasswordHandler = $forgotPasswordHandler;
    }


    /**
     * @Route("/forgot", name="forgot", methods={"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function index(Request $request)
    {

        $form = $this->createForm(ForgotPasswordType::class)
            ->handleRequest($request);

        if ($this->forgotPasswordHandler->handle($form)) {

            return $this->redirectToRoute('forgot');
        }
        return $this->render('forgot/index.html.twig', [
            'form' => $form->createView()
        ]);

    }
}