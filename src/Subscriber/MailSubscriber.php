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
use App\Services\Interfaces\EmailerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class MailSubscriber
 * @package App\Subscriber
 */
class MailSubscriber implements EventSubscriberInterface
{
    /**
     * @var EmailerInterface
     */
    private $emailer;

    /**
     * MailSubscriber constructor.
     * @param EmailerInterface $emailer
     */
    public function __construct(EmailerInterface $emailer)
    {
        $this->emailer = $emailer;
    }


    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [

            RegisterMailEvent::NAME      => 'onRegisterMail',
            ResetPasswordMailEvent::NAME => 'onResetPasswordMail'
        ];
    }

    /**
     * @param RegisterMailEvent $event
     * @return mixed
     */
    public function onRegisterMail(RegisterMailEvent $event)
    {
        $this->emailer->mail('Validation de votre compte Snow Tricks',
            [ 'register@snowtricks.com' => 'Inscription à Snow Tricks'],
            $event->getEmail(),
            'Veuillez confirmez votre compte en cliquant sur ce lien : "http://st/confirmeregister/'.$event->getToken());
    }

    /**
     * @param ResetPasswordMailEvent $event
     * @return mixed
     */
    public function  onResetPasswordMail(ResetPasswordMailEvent $event)
    {
        $this->emailer->mail('Récupération de votre compte Snow Tricks',
            [ 'reset_password@snowtricks.com' => 'Récupération de mot passe'],
            $event->getEmail(),
            'Changer votre mot de passe en cliquant sur ce lien : "http://st/forgotPasswordValidation/'.$event->getToken());
    }

}