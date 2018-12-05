<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/12/2018
 * Time: 16:58
 */

namespace App\Services\Interfaces;

use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Interface EncoderInterface
 * @package App\Services\Interfaces
 */
interface EncoderInterface
{
    /**
     * EncoderInterface constructor.
     * @param EncoderFactoryInterface $encoder
     */
    public function __construct(EncoderFactoryInterface $encoder);

    /**
     * @param $class
     * @param $password
     * @return mixed
     */
    public function encodePassword($class, $password): string;
}