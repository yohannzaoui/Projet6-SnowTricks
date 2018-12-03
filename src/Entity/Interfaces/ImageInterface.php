<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/12/2018
 * Time: 10:05
 */

namespace App\Entity\Interfaces;

use Ramsey\Uuid\UuidInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Entity\Trick;

/**
 * Interface ImageInterface
 * @package App\Entity\Interfaces
 */
interface ImageInterface
{
    /**
     * ImageInterface constructor.
     */
    public function __construct();

    /**
     * @return UuidInterface
     */
    public function getId(): ?UuidInterface;

    /**
     * @param UuidInterface|null $id
     * @return mixed
     */
    public function setId(?UuidInterface $id);

    /**
     * @return UploadedFile|null
     */
    public function getFile(): ?UploadedFile;

    /**
     * @param UploadedFile|null $file
     * @return mixed
     */
    public function setFile(?UploadedFile $file);

    /**
     * @return Trick
     */
    public function getTrick(): Trick;

    /**
     * @param Trick|null $trick
     * @return mixed
     */
    public function setTrick(?Trick $trick);

    /**
     * @return string
     */
    public function getUrl(): ?string;

    /**
     * @param string $url
     * @return mixed
     */
    public function setUrl(?string $url);
}