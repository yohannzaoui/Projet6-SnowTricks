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
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * Class Image
 * @package App\Entity
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
    private $file;

    /**
     * @var
     */
    private $url;

    /**
     * @var
     */
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
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }


    /**
     * @param $file
     */
    public function setFile(UploadedFile $file)
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getTrick()
    {
        return $this->trick;
    }


    /**
     * @param $trick
     */
    public function setTrick(Trick $trick)
    {
        $this->trick = $trick;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }




}