<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 12/10/2018
 * Time: 16:27
 */

namespace App\Domain\Models;


/**
 * Class Media
 * @package App\Domain\Models
 */
class Media
{
    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $path;
    /**
     * @var
     */
    private $fileName;

    /**
     * Media constructor.
     * @param $path
     * @param $fileName
     */
    public function __construct($path, $fileName)
    {
        $this->path = $path;
        $this->fileName = $fileName;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path): void
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param mixed $fileName
     */
    public function setFileName($fileName): void
    {
        $this->fileName = $fileName;
    }
}