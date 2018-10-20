<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 20/10/2018
 * Time: 21:55
 */

namespace App\Domain\Models;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;


/**
 * Class Image
 * @package App\Domain\Models
 */
class Image
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var
     */
    private $fileName;


    /**
     * Image constructor.
     * @param $id
     * @param $fileName
     * @throws \Exception
     */
    public function __construct($fileName)
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