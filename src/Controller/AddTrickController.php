<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 29/11/2018
 * Time: 17:37
 */

namespace App\Controller;


use App\Controller\Interfaces\AddTrickControllerInterface;
use App\Entity\Trick;
use App\Form\AddTrickType;
use App\FormHandler\AddTrickHandler;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Twig\Environment;

/**
 * Class AddTrickController
 * @package App\Controller
 */
class AddTrickController implements AddTrickControllerInterface
{

    /**
     * @var AddTrickHandler
     */
    private $addTrickHandler;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * AddTrickController constructor.
     * @param AddTrickHandler $addTrickHandler
     * @param TokenStorageInterface $tokenStorage
     * @param Environment $twig
     * @param FormFactoryInterface $formFactory
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        AddTrickHandler $addTrickHandler,
        TokenStorageInterface $tokenStorage,
        Environment $twig,
        FormFactoryInterface $formFactory,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->addTrickHandler = $addTrickHandler;
        $this->tokenStorage = $tokenStorage;
        $this->twig = $twig;
        $this->formFactory = $formFactory;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     * @IsGranted("ROLE_USER")
     * @Route(path="/ajouterTrick", name="addtrick", methods={"GET","POST"})
     */
    public function index(Request $request)
    {
        $trick = new Trick();

        $author = $this->tokenStorage->getToken()->getUser();

        $form = $this->formFactory->create(AddTrickType::class, $trick)
            ->handleRequest($request);

        if ($this->addTrickHandler->handle($trick, $author, $form)) {

            return new RedirectResponse($this->urlGenerator->generate('trick', [
                'slug' => $trick->getSlug()
            ]), RedirectResponse::HTTP_FOUND);
        }

        return new Response($this->twig->render('add_trick/index.html.twig', [
            'form' => $form->createView()
        ]), Response::HTTP_OK);

    }
}