<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 03/12/2018
 * Time: 09:32
 */

namespace App\Tests\Controller;


use App\Controller\DeleteTrickController;
use App\Controller\Interfaces\DeleteTrickControllerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Repository\TrickRepository;
use App\Repository\ImageRepository;
use App\Services\FileRemover;
use Twig\Environment;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DeleteTrickControllerTest extends KernelTestCase
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

    /**
     *
     */
    public function setUp()
    {
        static::bootKernel();

        $this->twig = static::$kernel->getContainer()->get('twig');
        $this->urlGenerator = static::$kernel->getContainer()->get('router');
        $this->messageFlash = static::$kernel->getContainer()->get('session');
    }

    /**
     *
     */
    public function testConstruct()
    {
        $this->trickRepository = $this->createMock(TrickRepository::class);
        $this->imageRepository = $this->createMock(ImageRepository::class);
        $this->fileRemover = $this->createMock(FileRemover::class);

        $deleteTrickController = new DeleteTrickController(
            $this->trickRepository,
            $this->imageRepository,
            $this->fileRemover,
            $this->twig,
            $this->urlGenerator,
            $this->messageFlash
        );

        static::assertInstanceOf(DeleteTrickControllerInterface::class, $deleteTrickController);
    }
}