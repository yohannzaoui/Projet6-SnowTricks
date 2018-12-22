<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 12:57
 */

namespace App\Controller;


use App\Controller\Interfaces\HomeControllerInterface;
use App\Repository\TrickRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController implements HomeControllerInterface
{
    /**
     * @var TrickRepository
     */
    private $trickRepository;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * HomeController constructor.
     * @param TrickRepository $trickRepository
     * @param Environment $twig
     */
    public function __construct(
        TrickRepository $trickRepository,
        Environment $twig
    ) {
        $this->trickRepository = $trickRepository;
        $this->twig = $twig;
    }


    /**
     * @Route(path="/", name="home", methods={"GET"})
     * @Route(path="tricks/list/{page}", name="page_trick", methods={"GET"})
     * @param int $page
     * @return mixed|Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index($page = 1)
    {
        $tricks = $this->trickRepository->getTricks($page, 6);

        $pagination = [
            'page' => $page,
            'route' => 'page_trick',
            'pages_count' => ceil(count($tricks) / 6),
            'route_params' => []
        ];

        return new Response($this->twig->render('home/index.html.twig', [
            'tricks' => $tricks,
            'pagination' => $pagination
        ]), Response::HTTP_OK);
    }
}