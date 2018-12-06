<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 03/12/2018
 * Time: 21:52
 */

namespace App\Tests\Services;


use App\Services\FileUploader;
use App\Services\Interfaces\FileUploaderInterface;
use PHPUnit\Framework\TestCase;
//use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploaderTest extends TestCase
{

    public function testConstruct()
    {
        $fileUploader = new FileUploader('/public/uploads/images');

        static::assertInstanceOf(
            FileUploaderInterface::class,
            $fileUploader
        );
    }

    /*public function testUploadFile()
    {
        $uploadFile = $this->createMock(UploadedFile::class);


    }*/
}