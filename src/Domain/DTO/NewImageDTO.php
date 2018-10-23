<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 12/10/2018
 * Time: 22:06
 */
declare(strict_types = 1);

namespace App\Domain\DTO;



use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class NewImageDTO
 * @package App\Domain\DTO
 */
class NewImageDTO
{

    /**
     * @var \SplFileInfo
     */
    public $file;


    /**
     * NewImageDTO constructor.
     * @param UploadedFile $file
     */
    public function __construct(UploadedFile $file)
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