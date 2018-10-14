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
    private $fileName;


    /**
     * Media constructor.
     * @param null $fileName
     * @throws \Exception
     */
    public function __construct($fileName = null)
    {
        $this->id = Uuid::uuid4();
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