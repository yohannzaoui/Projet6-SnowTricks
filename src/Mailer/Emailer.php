<?php

namespace App\Mailer;

use Swift_Message;
use App\Mailer\Interfaces\EmailerInterface;

/**
 * Class Emailer
 * @package App\Mailer
 */
class Emailer implements EmailerInterface
{
    /**
     * @param $subject
     * @param array $from
     * @param $to
     * @param $body
     * @return Swift_Message
     */
    public function mail($subject, $from = [], $to, $body)
    {
        $message = (new Swift_Message($subject))
                        ->setFrom($from)
                        ->setTo($to)
                        ->setBody($body);

        return $message;
    }
}