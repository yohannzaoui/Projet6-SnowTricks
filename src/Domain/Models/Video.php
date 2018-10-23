<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 20/10/2018
 * Time: 21:47
 */

namespace App\Domain\Models;


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * Class Video
 * @package App\Domain\Models
 */
class Video
{

    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var
     */
    private $url;



    /**
     * Video constructor.
     * @param $url
     * @throws \Exception
     */
    public function __construct($url = null)
    {
        $this->id = Uuid::uuid4();
        $this->url = $url;
    }

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }

    /**
     * @param UuidInterface $id
     */
    public function setId(UuidInterface $id): void
    {
        $this->id = $id;
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
    public function setUrl($url): void
    {
        $this->url = $url;
    }




}