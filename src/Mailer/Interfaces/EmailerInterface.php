<?php

namespace App\Mailer\Interfaces;

/**
 * Interface EmailerInterface
 * @package App\Mailer\Interfaces
 */
interface EmailerInterface
{
    /**
     * @param $subject
     * @param array $from
     * @param $to
     * @param $body
     * @return mixed
     */
    public function mail($subject, $from = [], $to, $body);
}