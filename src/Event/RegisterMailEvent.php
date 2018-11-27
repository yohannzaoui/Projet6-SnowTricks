<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 27/11/2018
 * Time: 09:48
 */

namespace App\Event;


use App\Event\Interfaces\RegisterMailEventInterface;
use Symfony\Component\EventDispatcher\Event;
use App\Services\Interfaces\EmailerInterface;

/**
 * Class RegisterMailEvent
 * @package App\Event
 */
class RegisterMailEvent extends Event implements RegisterMailEventInterface
{
    /**
     *
     */
    const NAME = "registerMail.event";

    /**
     * @var
     */
    private $email;

    /**
     * @var
     */
    private $token;

    /**
     * @var EmailerInterface
     */
    private $emailer;

    /**
     * RegisterMailEvent constructor.
     * @param EmailerInterface $emailer
     * @param $email
     * @param $token
     */
    public function __construct(
        EmailerInterface $emailer,
        $email,
        $token
    ) {
        $this->emailer = $emailer;
        $this->email = $email;
        $this->token = $token;
    }

    /**
     *
     */
    public function sendEmail()
    {
        $this->emailer->mail('Validation de votre compte Snow Tricks',
            [ 'register@snowtricks.com' => 'Inscription à Snow Tricks'],
            $this->email,
            'Veuillez confirmez votre compte en cliquant sur ce lien : "http://st/confirmeregister/'.$this->token);
    }
}