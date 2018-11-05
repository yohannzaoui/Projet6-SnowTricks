<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 12/10/2018
 * Time: 22:06
 */
declare(strict_types = 1);

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\NewDefaultImageDTOInterface;

/**
 * Class NewDefaultImageDTO
 * @package App\Domain\DTO
 */
class NewDefaultImageDTO implements NewDefaultImageDTOInterface
{


    /**
     * @var
     */
    public $file;


    /**
     * NewImageDTO constructor.
     * @param
     */
    public function __construct($file)
    {
        $this->file = $file;
    }


    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->file;
    }
}