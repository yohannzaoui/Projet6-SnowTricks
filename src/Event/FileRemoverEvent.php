<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 01/12/2018
 * Time: 11:47
 */

namespace App\Event;


use App\Event\Interfaces\FileRemoverEventInterface;
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
     * @var string|null
     */
    private $file;


    public function __construct(
        ?string $file
    ) {
        $this->file = $file;
    }

    /**
     * @return mixed|string|null
     */
    public function removeFile(): ? string
    {
        return $this->file;
    }
}