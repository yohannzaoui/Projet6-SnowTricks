<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 20/10/2018
 * Time: 21:55
 */

namespace App\Entity;

use App\Entity\Interfaces\ImageInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;



class Image implements ImageInterface
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var
     */
    private $fileName;

    private $trick;


    /**
     * Image constructor.
     * @param $id
     * @throws \Exception
     */
    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
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
    public function getTrick()
    {
        return $this->trick;
    }

    /**
     * @param mixed $trick
     */
    public function setTrick($trick): void
    {
        $this->trick = $trick;
    }






}