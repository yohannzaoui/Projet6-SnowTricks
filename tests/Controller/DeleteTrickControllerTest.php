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
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Twig\Environment;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class DeleteTrickControllerTest
 * @package App\Tests\Controller
 */
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
     * @var
     */
    private $eventDispatcher;

    /**
     *
     */
    public function setUp()
    {
        static::bootKernel();

        $this->twig = static::$kernel->getContainer()->get('twig');
        $this->urlGenerator = static::$kernel->getContainer()->get('router');
        $this->messageFlash = static::$kernel->getContainer()->get('session');
        $this->eventDispatcher = static::$kernel->getContainer()->get('event_dispatcher');
    }

    /**
     *
     */
    public function testConstruct()
    {
        $this->trickRepository = $this->createMock(TrickRepository::class);
        $this->imageRepository = $this->createMock(ImageRepository::class);

        $deleteTrickController = new DeleteTrickController(
            $this->trickRepository,
            $this->imageRepository,
            $this->twig,
            $this->urlGenerator,
            $this->messageFlash,
            $this->eventDispatcher
        );

        static::assertInstanceOf(DeleteTrickControllerInterface::class, $deleteTrickController);
    }
}