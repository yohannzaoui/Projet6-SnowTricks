<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 14/10/2018
 * Time: 21:15
 */

namespace App\Services;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * Class FileUploader
 * @package App\Services
 */
class FileUploader
{
    /**
     * @var
     */
    private $targetDirectory;

    /**
     * FileUploader constructor.
     * @param $targetDirectory
     */
    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        try {
            $file->move($this->getTargetDirectory(), $fileName);
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
        }

        return $fileName;
    }

    /**
     * @return mixed
     */
    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}