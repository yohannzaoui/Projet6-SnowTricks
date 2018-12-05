<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/12/2018
 * Time: 12:20
 */

namespace App\Tests\Controller;


use App\Controller\EditTrickController;
use App\Controller\Interfaces\EditTrickControllerInterface;
use App\FormHandler\Interfaces\EditTrickHandlerInterface;
use App\Repository\TrickRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Twig\Environment;

/**
 * Class EditTrickControllerTest
 * @package App\Tests\Controller
 */
class EditTrickControllerTest extends KernelTestCase
{

    /**
     * @var EditTrickHandlerInterface
     */
    private $editTrickHandler;

    /**
     * @var TrickRepository
     */
    private $trickRepository;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var Environment
     */
    private $twig;


    /**
     *
     */
    public function setUp()
    {
        $this->editTrickHandler = $this->createMock(
            EditTrickHandlerInterface::class
        );
        $this->trickRepository = $this->createMock(
            TrickRepository::class
        );
        $this->formFactory = $this->createMock(
            FormFactoryInterface::class
        );
        $this->tokenStorage = $this->createMock(
            TokenStorageInterface::class
        );
        $this->urlGenerator = $this->createMock(
            UrlGeneratorInterface::class
        );
        $this->twig = $this->createMock(
            Environment::class
        );
    }

    /**
     *
     */
    public function testConstruct()
    {
        $editTrickController = new EditTrickController(
            $this->editTrickHandler,
            $this->trickRepository,
            $this->formFactory,
            $this->tokenStorage,
            $this->urlGenerator,
            $this->twig
        );

        static::assertInstanceOf(
            EditTrickControllerInterface::class,
            $editTrickController
        );
    }

}