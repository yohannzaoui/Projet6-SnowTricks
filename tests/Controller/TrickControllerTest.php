<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/12/2018
 * Time: 09:06
 */

namespace App\Tests\Controller;


use App\Controller\Interfaces\TrickControllerInterface;
use App\Controller\TrickController;
use App\FormHandler\Interfaces\CommentHandlerInterface;
use App\Repository\CommentRepository;
use App\Repository\TrickRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Twig\Environment;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class TrickControllerTest extends KernelTestCase
{
    /**
     * @var TrickRepository
     */
    private $trickRepository;

    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * @var CommentHandlerInterface
     */
    private $commentHandler;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var Environment
     */
    private $twig;

    public function setUp()
    {
        static::bootKernel();

        $this->trickRepository = $this->createMock(
            TrickRepository::class
        );
        $this->commentRepository = $this->createMock(
            CommentRepository::class
        );
        $this->commentHandler = $this->createMock(
            CommentHandlerInterface::class
        );
        $this->formFactory = static::$kernel->getContainer()
            ->get('form.factory')
        ;
        $this->urlGenerator = static::$kernel->getContainer()
            ->get('router')
        ;
        $this->tokenStorage = static::$kernel->getContainer()
            ->get('security.token_storage')
        ;
        $this->twig = $this->createMock(
            Environment::class
        );
    }

    public function testConstruct()
    {
        $trickController = new TrickController(
            $this->trickRepository,
            $this->commentHandler,
            $this->commentRepository,
            $this->formFactory,
            $this->urlGenerator,
            $this->tokenStorage,
            $this->twig
        );

        static::assertInstanceOf(
            TrickControllerInterface::class,
            $trickController
            );
    }
}