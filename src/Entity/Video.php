<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 20/10/2018
 * Time: 21:47
 */

namespace App\Entity;


use App\Entity\Interfaces\VideoInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * Class Video
 * @package
 */
class Video implements VideoInterface
{

    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var
     */
    private $url;

    private $trick;



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
    public function setTrick(Trick $trick)
    {
        $this->trick = $trick;
    }




}