<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 11:21
 */

namespace App\Tests\FormHandler;

use App\FormHandler\AddTrickHandler;
use App\FormHandler\Interfaces\AddTrickHandlerInterface;
use App\Services\FileUploader;
use App\Repository\TrickRepository;
use App\Services\Interfaces\SluggerInterface;
use PHPUnit\Framework\TestCase;

class AddTrickHandlerTest extends TestCase
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

    public function setUp()
    {
        $this->fileUploader = $this->createMock(FileUploader::class);
        $this->trickRepository = $this->createMock(TrickRepository::class);
        $this->slugger = $this->createMock(SluggerInterface::class);
    }

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
}