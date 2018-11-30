<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 29/11/2018
 * Time: 22:58
 */

namespace App\Controller\Interfaces;

use App\Repository\TrickRepository;
use App\Repository\ImageRepository;
use App\Services\FileRemover;
use Twig\Environment;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface DeleteTrickControllerInterface
 * @package App\Controller\Interfaces
 */
interface DeleteTrickControllerInterface
{
    /**
     * DeleteTrickControllerInterface constructor.
     * @param TrickRepository $trickRepository
     * @param ImageRepository $imageRepository
     * @param FileRemover $fileRemover
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     * @param SessionInterface $messageFlash
     */
    public function __construct(
        TrickRepository $trickRepository,
        ImageRepository $imageRepository,
        FileRemover $fileRemover,
        Environment $twig,
        UrlGeneratorInterface $urlGenerator,
        SessionInterface $messageFlash
    );

    /**
     * @param Request $request
     * @return mixed
     */
    public function confirme(Request $request);

    /**
     * @param Request $request
     * @return mixed
     */
    public function delete(Request $request);
}