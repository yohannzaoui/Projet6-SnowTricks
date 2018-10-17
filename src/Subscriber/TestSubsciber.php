<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 17/10/2018
 * Time: 11:15
 */

namespace App\Subscriber;


use App\Event\TestEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;

class TestSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            TestEvent::NAME => 'onHello'
        ];
    }

    public function onHello(TestEvent $event)
    {
        return new Response(
            $event->sayHello()
        );
    }


}