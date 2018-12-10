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
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
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
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     * @param SessionInterface $messageFlash
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(
        TrickRepository $trickRepository,
        ImageRepository $imageRepository,
        Environment $twig,
        UrlGeneratorInterface $urlGenerator,
        SessionInterface $messageFlash,
        EventDispatcherInterface $eventDispatcher
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