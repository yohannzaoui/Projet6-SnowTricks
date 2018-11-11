<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 08/11/2018
 * Time: 15:37
 */

namespace App\Controller;


use App\Repository\ImageRepository;
use App\Repository\TrickRepository;
use App\Services\FileRemover;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DeleteTrickController
 * @package App\Controller
 */
final class DeleteTrickController extends AbstractController
{

    /**
     * @var TrickRepository
     */
    private $trickRepository;

    /**
     * @var ImageRepository
     */
    private $imageRepository;

    /**
     * @var FileRemover
     */
    private $fileRemover;


    /**
     * DeleteTrickController constructor.
     * @param TrickRepository $trickRepository
     * @param ImageRepository $imageRepository
     * @param FileRemover $fileRemover
     */
    public function __construct(
        TrickRepository $trickRepository,
        ImageRepository $imageRepository,
        FileRemover $fileRemover
    ) {
        $this->trickRepository = $trickRepository;
        $this->imageRepository = $imageRepository;
        $this->fileRemover = $fileRemover;
    }


    /**
     * @Route("/confirmeDeleteTrick/{id}", name="confirmeDeleteTrick", methods={"GET"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function confirme(Request $request)
    {
        if ($request->attributes->get('id')) {

            return $this->render('delete_trick/delete_trick.html.twig', [
                'id' => $request->attributes->get('id')
            ]);
        }
    }


    /**
     * @Route("/delete/{id}", name="deltrick", methods={"GET"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Request $request)
    {
        if ($request->attributes->get('id')) {

            $file = $this->trickRepository->getDefaultImage($request->attributes->get('id'));
            $files = $this->imageRepository->checkImages($request->attributes->get('id'));

            //dd($defaultImage);
            foreach ($file as $defaultImage) {
                $this->fileRemover->deleteFile($defaultImage);
            }


            foreach ($files as $a => $urls) {
                foreach ($urls as $url) {
                    $this->fileRemover->deleteFile($url);
                }
            }

            $this->trickRepository->delete($request->attributes->get('id'));

            $this->addFlash('deleteTrick', 'Le trick à bien été supprimé');

            return $this->redirectToRoute('home');
        }
    }
}