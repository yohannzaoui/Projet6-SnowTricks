<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 31/10/2018
 * Time: 09:46
 */

namespace App\Domain\DTO\Interfaces;


/**
 * Interface NewdefaultImageDTOInterface
 * @package App\Domain\DTO\Interfaces
 */
interface NewDefaultImageDTOInterface
{
    /**
     * NewdefaultImageDTOInterface constructor.
     * @param $file
     */
    public function __construct($file);

    /**
     * @return mixed
     */
    public function getFileName();
}