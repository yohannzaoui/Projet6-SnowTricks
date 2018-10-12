<?php

namespace App\Mailer\Interfaces;

interface EmailerInterface
{
    public function mail($subject, $from = [], $to, $body);
}