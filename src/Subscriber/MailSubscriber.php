<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 27/11/2018
 * Time: 10:07
 */

namespace App\Subscriber;


use App\Event\RegisterMailEvent;
use App\Event\ResetPasswordMailEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class MailSubscriber
 * @package App\Subscriber
 */
class MailSubscriber implements EventSubscriberInterface
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [

            RegisterMailEvent::NAME => 'onRegisterMail',
            ResetPasswordMailEvent::NAME => 'onResetPasswordMail'
        ];
    }

    /**
     * @param RegisterMailEvent $event
     * @return mixed|void
     */
    public function onRegisterMail(RegisterMailEvent $event)
    {
        return $event->sendEmail();
    }

    /**
     * @param ResetPasswordMailEvent $event
     * @return mixed|void
     */
    public function  onResetPasswordMail(ResetPasswordMailEvent $event)
    {
        return $event->sendEmail();
    }

}