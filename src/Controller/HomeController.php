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
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Controller
 */
final class HomeController extends AbstractController implements HomeControllerInterface
{
    /**
     * @var TrickRepository
     */
    private $trickRepository;

    /**
     * HomeController constructor.
     * @param TrickRepository $trickRepository
     */
    public function __construct(TrickRepository $trickRepository)
    {
        $this->trickRepository = $trickRepository;
    }


    /**
     * @Route("/", name="home", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $tricks = $this->trickRepository->getAllTricks();

        return $this->render('home/index.html.twig', [
            'tricks' => $tricks
        ]);
    }
}