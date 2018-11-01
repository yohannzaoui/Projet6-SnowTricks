<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 20/10/2018
 * Time: 21:55
 */

namespace App\Domain\Models;

use App\Domain\Models\Interfaces\ImageInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;


/**
 * Class Image
 * @package App\Domain\Models
 */
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
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getImage()
    {
        return $this->fileName;
    }


}