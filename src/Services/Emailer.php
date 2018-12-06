<?php

namespace App\Services;

use App\Services\Interfaces\EmailerInterface;
use Swift_Message;

/**
 * Class Emailer
 * @package App\Services\Mailer
 */
class Emailer implements EmailerInterface
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * Emailer constructor.
     * @param \Swift_Mailer $mailer
     */
    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param $subject
     * @param array $from
     * @param $to
     * @param $body
     * @return mixed|void
     */
    public function mail($subject, $from = [], $to, $body)
    {
        $message = (new Swift_Message($subject))
                        ->setFrom($from)
                        ->setTo($to)
                        ->setBody($body);

        $this->mailer->send($message);
    }
}