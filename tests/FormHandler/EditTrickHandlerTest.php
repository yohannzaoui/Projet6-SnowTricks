<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 20:59
 */

namespace App\Tests\FormHandler;


use App\FormHandler\EditTrickHandler;
use App\FormHandler\Interfaces\EditTrickHandlerInterface;
use App\Repository\TrickRepository;
use App\Services\FileRemover;
use App\Services\FileUploader;
use App\Services\Interfaces\SluggerInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class EditTrickHandlerTest
 * @package App\Tests\FormHandler
 */
class EditTrickHandlerTest extends TestCase
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
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var FileRemover
     */
    private $fileRemover;

    /**
     *
     */
    public function setUp()
    {
        $this->fileUploader = $this->createMock(
            FileUploader::class
        );
        $this->trickRepository = $this->createMock(
            TrickRepository::class
        );
        $this->slugger = $this->createMock(
            SluggerInterface::class
        );
        $this->eventDispatcher = $this->createMock(
            EventDispatcherInterface::class
        );
        $this->fileRemover = $this->createMock(
            FileRemover::class
        );
    }

    /**
     *
     */
    public function testConstruct()
    {
        $editTrickHandler = new EditTrickHandler(
          $this->fileUploader,
          $this->trickRepository,
          $this->slugger,
          $this->eventDispatcher,
          $this->fileRemover
        );

        static::assertInstanceOf(
            EditTrickHandlerInterface::class,
            $editTrickHandler
        );
    }
}