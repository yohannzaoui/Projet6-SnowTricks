<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 27/11/2018
 * Time: 09:48
 */

namespace App\Event;


use App\Event\Interfaces\MailEventInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class RegisterMailEvent
 * @package App\Event
 */
class RegisterMailEvent extends Event implements MailEventInterface
{
    /**
     *
     */
    const NAME = "registerMail.event";

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
     * @return mixed|string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return mixed|string
     */
    public function getToken(): string
    {
        return $this->token;
    }
}