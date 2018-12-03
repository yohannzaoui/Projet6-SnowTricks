<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 08/11/2018
 * Time: 10:03
 */

namespace App\Services\Interfaces;

use Symfony\Component\Filesystem\Filesystem;


/**
 * Interfaces FileRemoverInterface
 * @package App\Services\Interfaces
 */
interface FileRemoverInterface
{
    /**
     * FileRemoverInterface constructor.
     * @param Filesystem $fileSystem
     * @param $path
     */
    public function __construct(Filesystem $fileSystem, $path);

    /**
     * @param $file
     * @return mixed
     */
    public function deleteFile(string $file);
}