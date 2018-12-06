<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 01/12/2018
 * Time: 11:47
 */

namespace App\Event;


use App\Event\Interfaces\FileRemoverEventInterface;
use App\Services\FileRemover;
use App\Services\Interfaces\FileRemoverInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class FileRemoverEvent
 * @package App\Event
 */
class FileRemoverEvent extends Event implements FileRemoverEventInterface
{
    /**
     *
     */
    const NAME = 'fileRemover.event';

    /**
     * @var FileRemover
     */
    private $fileRemover;

    /**
     * @var
     */
    private $file;

    /**
     * FileRemoverEvent constructor.
     * @param FileRemoverInterface $fileRemover
     * @param string $file
     */
    public function __construct(
        ?FileRemoverInterface $fileRemover,
        ?string $file
    ) {
        $this->fileRemover = $fileRemover;
        $this->file = $file;
    }

    /**
     *
     */
    public function removeFile()
    {
        $this->fileRemover->deleteFile($this->file);
    }
}