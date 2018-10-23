<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 22/10/2018
 * Time: 13:07
 */

namespace App\Domain\DTO\Interfaces;


/**
 * Interface NewImageDTOInterface
 * @package App\Domain\DTO\Interfaces
 */
interface NewImageDTOInterface
{
    /**
     * NewImageDTOInterface constructor.
     * @param $fileName
     */
    public function __construct($fileName);

    /**
     * @return mixed
     */
    public function getFileName();
}