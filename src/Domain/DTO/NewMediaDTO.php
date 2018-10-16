<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 12/10/2018
 * Time: 22:06
 */

namespace App\Domain\DTO;


class NewMediaDTO
{
    public $file;

    public function __construct($file = null)
    {
        $this->file = $file;
    }
}