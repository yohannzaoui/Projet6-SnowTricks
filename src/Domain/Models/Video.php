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
    public function __construct($url)
    {
        $this->id = Uuid::uuid4();
        $this->url = $url;
    }


}