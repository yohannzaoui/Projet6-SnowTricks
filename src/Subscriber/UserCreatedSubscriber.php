<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 17/10/2018
 * Time: 20:43
 */

namespace App\Subscriber;

use App\Event\UserCreateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;

class UserCreatedSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            UserCreateEvent::NAME => 'onUserCreatedEvent'
        ];
    }

    public function onUserCreatedEvent(UserCreateEvent $event)
    {
        return new Response(
            $event->email()
        );
    }

}