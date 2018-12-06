<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/12/2018
 * Time: 10:21
 */

namespace App\Entity\Interfaces;

use Ramsey\Uuid\UuidInterface;
use App\Entity\Trick;

/**
 * Interface VideoInterface
 * @package App\Entity\Interfaces
 */
interface VideoInterface
{
    /**
     * VideoInterface constructor.
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
     * @return string|null
     */
    public function getUrl(): ?string;

    /**
     * @param string|null $url
     * @return mixed
     */
    public function setUrl(?string $url);

    /**
     * @return Trick|null
     */
    public function getTrick(): ?Trick;

    /**
     * @param Trick|null $trick
     * @return mixed
     */
    public function setTrick(?Trick $trick);
}