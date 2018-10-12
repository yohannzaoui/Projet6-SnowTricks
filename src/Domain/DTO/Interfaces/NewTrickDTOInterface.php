<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 11/10/2018
 * Time: 18:31
 */

namespace App\Domain\DTO\Interfaces;


/**
 * Interface NewTrickDTOInterface
 * @package App\Domain\DTO\Interfaces
 */
interface NewTrickDTOInterface
{
    /**
     * NewTrickDTOInterface constructor.
     * @param null $name
     * @param null $description
     * @param null $image
     * @param null $video
     */
    public function __construct($name = null, $description = null, $image = null, $video = null);
}