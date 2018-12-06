<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 11:21
 */

namespace App\Tests\FormHandler;

use App\Entity\Trick;
use App\Entity\User;
use App\FormHandler\AddTrickHandler;
use App\FormHandler\Interfaces\AddTrickHandlerInterface;
use App\Services\FileUploader;
use App\Repository\TrickRepository;
use App\Services\Interfaces\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Form\FormInterface;

/**
 * Class AddTrickHandlerTest
 * @package App\Tests\FormHandler
 */
class AddTrickHandlerTest extends KernelTestCase
{
    /**
     * @var FileUploader
     */
    private $fileUploader;

    /**
     * @var TrickRepository
     */
    private $trickRepository;

    /**
     * @var SluggerInterface
     */
    private $slugger;

    /**
     *
     */
    public function setUp()
    {
        $this->fileUploader = $this->createMock(FileUploader::class);
        $this->trickRepository = $this->createMock(TrickRepository::class);
        $this->slugger = $this->createMock(SluggerInterface::class);
    }

    /**
     *
     */
    public function testConstruct()
    {
        $addTrickHandler = new AddTrickHandler(
            $this->fileUploader,
            $this->trickRepository,
            $this->slugger
        );

        static::assertInstanceOf(
            AddTrickHandlerInterface::class,
            $addTrickHandler
        );
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function testHandlerIfIsTrue()
    {

        $trick = $this->createMock(Trick::class);
        $author = $this->createMock(User::class);
        $form = $this->createMock(FormInterface::class);

        $addTrickHandler = new AddTrickHandler(
            $this->fileUploader,
            $this->trickRepository,
            $this->slugger
        );

        static::assertTrue(true, $addTrickHandler->handle(
            $trick, $author, $form
        ));
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function testHandlerIfIsFalse()
    {

        $trick = $this->createMock(Trick::class);
        $author = $this->createMock(User::class);
        $form = $this->createMock(FormInterface::class);

        $addTrickHandler = new AddTrickHandler(
            $this->fileUploader,
            $this->trickRepository,
            $this->slugger
        );

        static::assertFalse(false, $addTrickHandler->handle(
            $trick, $author, $form
        ));
    }
}