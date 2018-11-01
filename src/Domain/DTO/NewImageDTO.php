<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 12/10/2018
 * Time: 22:06
 */
declare(strict_types = 1);

namespace App\Domain\DTO;


/**
 * Class NewImageDTO
 * @package App\Domain\DTO
 */
class NewImageDTO
{


    public $files;


    /**
     * NewImageDTO constructor.
     * @param
     */
    public function __construct(array $files = [])
    {
        $this->files = $files;
    }


    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->files;
    }
}