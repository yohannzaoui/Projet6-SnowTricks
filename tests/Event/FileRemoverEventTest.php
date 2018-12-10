<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 21:46
 */

namespace App\Tests\Event;


use App\Event\FileRemoverEvent;
use App\Event\Interfaces\FileRemoverEventInterface;
use App\Services\FileRemover;
use PHPUnit\Framework\TestCase;

/**
 * Class FileRemoverEventTest
 * @package App\Tests\Event
 */
class FileRemoverEventTest extends TestCase
{
    /**
     *
     */
    const NAME = 'fileRemover.event';

    /**
     * @var
     */
    private $file;


    /**
     *
     */
    public function setUp()
    {
        $this->fileRemover = $this->createMock(
            FileRemover::class
        );
        $this->file = 'file';
    }

    /**
     *
     */
    public function testConstruct()
    {
        $fileRemoverEvent = new FileRemoverEvent(
          $this->file
        );

        static::assertInstanceOf(
            FileRemoverEventInterface::class,
            $fileRemoverEvent
            );
    }

    /**
     *
     */
    public function testIfRemoveFileReturnString()
    {
        $fileRemoverEvent = new FileRemoverEvent(
          $this->file
        );

        $fileRemoverEvent->removeFile();
        $this->assertSame('file', $fileRemoverEvent->removeFile());
    }
}