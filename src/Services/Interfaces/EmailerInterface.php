<?php

namespace App\Services\Interfaces;

/**
 * Interface EmailerInterface
 * @package App\Services\Interfaces
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