<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 01/11/2018
 * Time: 19:41
 */

namespace App\Services;

use Symfony\Component\Filesystem\Filesystem;


class FileRemover
{
    private $fileSystem;

    public function __construct(Filesystem $fileSystem)
    {
        $this->fileSystem = $fileSystem;
    }

    public function deleteFile($file)
    {
        $this->fileSystem->remove($file);
    }
}