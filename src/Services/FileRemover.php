<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 01/11/2018
 * Time: 19:41
 */

namespace App\Services;

use App\Services\Interfaces\FileRemoverInterface;
use Symfony\Component\Filesystem\Filesystem;


/**
 * Class FileRemover
 * @package App\Services
 */
final class FileRemover implements FileRemoverInterface
{
    /**
     * @var Filesystem
     */
    private $fileSystem;

    /**
     * @var
     */
    private $path;

    /**
     * FileRemover constructor.
     * @param Filesystem $fileSystem
     * @param $path
     */
    public function __construct(Filesystem $fileSystem, $path)
    {
        $this->fileSystem = $fileSystem;
        $this->path = $path;
    }

    /**
     * @param $file
     * @return mixed|void
     */
    public function deleteFile($file)
    {
        if (is_file($this->path.'/'.$file)) {

            $this->fileSystem->remove($this->path.'/'.$file);
        }

    }
}