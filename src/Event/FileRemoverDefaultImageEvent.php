<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 01/12/2018
 * Time: 11:47
 */

namespace App\Event;


use App\Services\FileRemover;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class FileRemoverDefaultImageEvent
 * @package App\Event
 */
class FileRemoverDefaultImageEvent extends Event
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
     * FileRemoverDefaultImageEvent constructor.
     * @param FileRemover $fileRemover
     * @param string $file
     */
    public function __construct(FileRemover $fileRemover, string $file)
    {
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