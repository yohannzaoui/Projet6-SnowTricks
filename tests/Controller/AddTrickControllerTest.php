<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/12/2018
 * Time: 15:16
 */

namespace App\Tests\Controller;

use App\Controller\AddTrickController;
use App\Controller\Interfaces\AddTrickControllerInterface;
use App\FormHandler\AddTrickHandler;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Twig\Environment;

class AddTrickControllerTest extends KernelTestCase
{

    /**
     * @var AddTrickHandler
     */
    private $addTrickHandler;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;


    /**
     *
     */
    public function setUp()
    {
        static::bootKernel();

        $this->formFactory = static::$kernel->getContainer()->get('form.factory');
        $this->tokenStorage = static::$kernel->getContainer()->get('security.token_storage');
        $this->twig = static::$kernel->getContainer()->get('twig');
        $this->urlGenerator = static::$kernel->getContainer()->get('router');
        $this->addTrickHandler = $this->createMock(AddTrickHandler::class);
    }

    /**
     *
     */
    public function testConstruct()
    {
        $addTrickController = new AddTrickController(
            $this->addTrickHandler,
            $this->tokenStorage,
            $this->twig,
            $this->formFactory,
            $this->urlGenerator
        );

        static::assertInstanceOf(
            AddTrickControllerInterface::class,
            $addTrickController
        );
    }



}