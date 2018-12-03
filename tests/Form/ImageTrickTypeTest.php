<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 03/12/2018
 * Time: 21:00
 */

namespace App\Tests\Form;


use App\Entity\Image;
use App\Entity\Trick;
use App\Form\ImageTrickType;
use Symfony\Component\Form\Test\TypeTestCase;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Ramsey\Uuid\UuidInterface;

class ImageTrickTypeTest extends TypeTestCase
{
    public function testForm()
    {
        $uploadFile = $this->createMock(UploadedFile::class);
        $uuid = $this->createMock(UuidInterface::class);
        $trick = $this->createMock(Trick::class);

        $formData = [
            'file' => $uploadFile
        ];

        $imageToCompare = $this->createMock(Image::class);

        $form = $this->factory->create(ImageTrickType::class, $imageToCompare);

        $image = $this->createMock(Image::class);
        $image->setId($uuid);
        $image->setFile($uploadFile);
        $image->setUrl('url');
        $image->setTrick($trick);

        $form->submit($formData);

        $this->assertTrue($form->isValid());

        $this->assertEquals($image, $imageToCompare);

    }
}