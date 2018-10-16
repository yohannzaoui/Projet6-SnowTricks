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
     * @var null
     */
    private $file;


    /**
     * Media constructor.
     * @param null $file
     * @throws \Exception
     */
    public function __construct($file = null)
    {
        $this->id = Uuid::uuid4();
        $this->file = $file;
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
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $fileName
     */
    public function setFile($file): void
    {
        $this->file = $file;
    }

}