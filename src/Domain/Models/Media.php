<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 12/10/2018
 * Time: 16:27
 */

namespace App\Domain\Models;


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * Class Media
 * @package App\Domain\Models
 */
class Media
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var
     */
    private $path;

    /**
     * @var null
     */
    private $file;

    /**
     * @var null
     */
    private $fileName;


    /**
     * Media constructor.
     * @param null $path
     * @param null $file
     * @param null $fileName
     * @throws \Exception
     */
    public function __construct($path = null, $file = null, $fileName = null)
    {
        $this->id = Uuid::uuid4();
        $this->path = $path;
        $this->file = $file;
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

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file): void
    {
        $this->file = $file;
    }



}