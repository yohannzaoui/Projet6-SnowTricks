<?php

namespace App\Mailer;

use Swift_Message;

class Emailer
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