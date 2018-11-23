<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 16/10/2018
 * Time: 09:36
 */

namespace App\Services\Interfaces;

use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * Interface FileUploaderInterface
 * @package App\Services\Interfaces
 */
interface FileUploaderInterface
{
    /**
     * FileUploaderInterface constructor.
     * @param $targetDirectory
     */
    public function __construct($targetDirectory);

    /**
     * @param UploadedFile $file
     * @return mixed
     */
    public function upload(UploadedFile $file);

    /**
     * @return mixed
     */
    public function getTargetDirectory();
}