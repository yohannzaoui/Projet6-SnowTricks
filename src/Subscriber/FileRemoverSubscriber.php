<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 01/12/2018
 * Time: 12:02
 */

namespace App\Subscriber;


use App\Event\FileRemoverDefaultImageEvent;
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
            FileRemoverDefaultImageEvent::NAME => 'onFileRemoverDefaultImage'
        ];
    }

    /**
     * @param FileRemoverDefaultImageEvent $event
     * @return mixed|void
     */
    public function onFileRemoverDefaultImage(FileRemoverDefaultImageEvent $event)
    {
        return $event->removeFile();
    }

}