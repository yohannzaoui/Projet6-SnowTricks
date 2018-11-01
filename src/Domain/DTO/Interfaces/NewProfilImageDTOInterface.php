<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 31/10/2018
 * Time: 09:45
 */

namespace App\Domain\DTO\Interfaces;


/**
 * Interface NewProfilImageDTOInterface
 * @package App\Domain\DTO\Interfaces
 */
interface NewProfilImageDTOInterface
{
    /**
     * NewProfilImageDTOInterface constructor.
     * @param $file
     */
    public function __construct($file);

    /**
     * @return mixed
     */
    public function getFileName();
}