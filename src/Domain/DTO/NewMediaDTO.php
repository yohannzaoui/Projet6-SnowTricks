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
    public $path;
    public $fileName;
    public $file;

    public function __construct($path = null, $fileName = null, $file = null)
    {
        $this->path = $path;
        $this->fileName = $fileName;
        $this->file = $file;
    }
}