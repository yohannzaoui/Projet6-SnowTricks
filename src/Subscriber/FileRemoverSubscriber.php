<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 01/12/2018
 * Time: 12:02
 */

namespace App\Subscriber;


use App\Event\FileRemoverEvent;
use App\Services\Interfaces\FileRemoverInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class FileRemoverSubscriber
 * @package App\Subscriber
 */
class FileRemoverSubscriber implements EventSubscriberInterface
{
    /**
     * @var FileRemoverInterface
     */
    private $fileRemover;

    /**
     * FileRemoverSubscriber constructor.
     * @param FileRemoverInterface $fileRemover
     */
    public function __construct(FileRemoverInterface $fileRemover)
    {
        $this->fileRemover = $fileRemover;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            FileRemoverEvent::NAME => 'onFileRemover'
        ];
    }

    /**
     * @param FileRemoverEvent $event
     * @return mixed|void
     */
    public function onFileRemover(FileRemoverEvent $event)
    {
        $this->fileRemover->deleteFile($event->getFile());
    }

}