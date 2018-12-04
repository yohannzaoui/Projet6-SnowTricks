<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 21:46
 */

namespace App\Tests\Event;


use App\Event\FileRemoverDefaultImageEvent;
use App\Event\Interfaces\FileRemoverDefaultImageEventInterface;
use App\Services\FileRemover;
use PHPUnit\Framework\TestCase;

/**
 * Class FileRemoverDefaultImageEventTest
 * @package App\Tests\Event
 */
class FileRemoverDefaultImageEventTest extends TestCase
{
    /**
     *
     */
    const NAME = 'fileRemoverDefaultImage.event';

    /**
     * @var FileRemover
     */
    private $fileRemover;

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
        $fileRemoverDefaultImageEvent = new FileRemoverDefaultImageEvent(
          $this->fileRemover,
          $this->file
        );

        static::assertInstanceOf(
            FileRemoverDefaultImageEventInterface::class,
            $fileRemoverDefaultImageEvent
            );
    }
}