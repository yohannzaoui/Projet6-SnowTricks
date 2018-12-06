<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 08/11/2018
 * Time: 15:37
 */

namespace App\Controller;


use App\Controller\Interfaces\DeleteTrickControllerInterface;
use App\Repository\ImageRepository;
use App\Repository\TrickRepository;
use App\Services\FileRemover;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\Event\FileRemoverEvent;
use Twig\Environment;

/**
 * Class DeleteTrickController
 * @package App\Controller
 */
class DeleteTrickController implements DeleteTrickControllerInterface
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
     * @var Environment
     */
    private $twig;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var SessionInterface
     */
    private $messageFlash;

    private $eventDispatcher;


    /**
     * DeleteTrickController constructor.
     * @param TrickRepository $trickRepository
     * @param ImageRepository $imageRepository
     * @param FileRemover $fileRemover
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     * @param SessionInterface $messageFlash
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(
        TrickRepository $trickRepository,
        ImageRepository $imageRepository,
        FileRemover $fileRemover,
        Environment $twig,
        UrlGeneratorInterface $urlGenerator,
        SessionInterface $messageFlash,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->trickRepository = $trickRepository;
        $this->imageRepository = $imageRepository;
        $this->fileRemover = $fileRemover;
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
        $this->messageFlash = $messageFlash;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @Route("/confirmeDeleteTrick/{id}", name="confirmeDeleteTrick", methods={"GET"})
     * @param Request $request
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function confirme(Request $request)
    {
        if ($request->attributes->get('id')) {

            return new Response($this->twig->render('delete_trick/delete_trick.html.twig', [
                'id' => $request->attributes->get('id')
            ]), 200);
        }
    }


    /**
     * @Route("/delete/{id}", name="deltrick", methods={"GET"})
     * @param Request $request
     * @return mixed|RedirectResponse
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function delete(Request $request)
    {
        if ($request->attributes->get('id')) {

            $trick = $this->trickRepository->getTrick($request->attributes->get('id'));

            $defaultImage = $trick->getDefaultImage()->getUrl();

            if (!$trick) {
                throw new NonUniqueResultException("Ce Trick n'éxiste pas");
            }

            $files = $this->imageRepository->checkImages($request->attributes->get('id'));

            $this->eventDispatcher->dispatch(
                FileRemoverEvent::NAME,
                new FileRemoverEvent($this->fileRemover, $defaultImage));

            foreach ($files as $a => $urls) {
                foreach ($urls as $url) {
                    $this->eventDispatcher->dispatch(
                        FileRemoverEvent::NAME,
                        new FileRemoverEvent($this->fileRemover, $url));
                }
            }

            $this->trickRepository->delete($trick);

            $this->messageFlash->getFlashBag()->add('deleteTrick', 'Le trick à bien été supprimé');

            return new RedirectResponse($this->urlGenerator->generate('home'), 302);
        }

    }
}