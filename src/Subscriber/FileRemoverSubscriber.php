<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 01/12/2018
 * Time: 12:02
 */

namespace App\Subscriber;


use App\Event\FileRemoverEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class FileRemoverSubscriber
 * @package App\Subscriber
 */
class FileRemoverSubscriber implements EventSubscriberInterface
{
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
        return $event->removeFile();
    }

}