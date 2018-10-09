<?php

namespace App\Mailer;

use Swift_Message;
use App\Mailer\Interfaces\EmailerInterface;

class Emailer implements EmailerInterface
{
    public function mail($subject, $from = [], $to, $body)
    {
        $message = (new Swift_Message($subject))
                        ->setFrom($from)
                        ->setTo($to)
                        ->setBody($body);

        return $message;
    }
}