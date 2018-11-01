<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 20/10/2018
 * Time: 21:47
 */

namespace App\Domain\Models;


use App\Domain\Models\Interfaces\VideoInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * Class Video
 * @package App\Domain\Models
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
}