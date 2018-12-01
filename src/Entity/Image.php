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
     * @throws \Exception
     */
    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }

    /**
     * @return UuidInterface
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getFile(): ?UploadedFile
    {
        return $this->file;
    }


    /**
     * @param UploadedFile|null $file
     */
    public function setFile(?UploadedFile $file)
    {
        $this->file = $file;
    }

    /**
     * @return Trick
     */
    public function getTrick(): Trick
    {
        return $this->trick;
    }


    /**
     * @param Trick|null $trick
     */
    public function setTrick(?Trick $trick)
    {
        $this->trick = $trick;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }




}