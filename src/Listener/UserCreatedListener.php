<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 17/10/2018
 * Time: 12:49
 */

namespace App\Listener;


use App\Event\UserCreatedEvent;

class UserCreatedListener
{
    public function onUserCreated(UserCreatedEvent $event)
    {
        //envoi d'email

        $event->getUser();
    }
}