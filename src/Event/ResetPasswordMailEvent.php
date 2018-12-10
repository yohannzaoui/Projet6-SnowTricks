<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 27/11/2018
 * Time: 10:52
 */

namespace App\Event;


use App\Event\Interfaces\MailEventInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class ResetPasswordMailEvent
 * @package App\Event
 */
class ResetPasswordMailEvent extends Event implements MailEventInterface
{

    /**
     *
     */
    const NAME = 'resetPasswordMail.event';

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $token;

    /**
     * RegisterMailEvent constructor.
     * @param $email
     * @param $token
     */
    public function __construct(
        string $email,
        string $token
    ) {
        $this->email = $email;
        $this->token = $token;
    }

    /**
     * @return array|mixed
     */
    public function sendEmail()
    {
        return [
            'email' => $this->email,
            'token' => $this->token
        ];
    }
}