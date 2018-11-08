<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 16:25
 */

namespace App\FormHandler;


use App\Services\FileUploader;
use Symfony\Component\Form\FormInterface;

class AddTrickHandler
{
    private $fileUploader;

    public function __construct(FileUploader $fileUploader)
    {
        $this->fileUploader = $fileUploader;
    }

    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()) {

            dd($form->getData());

            $imageFile = $form->getData()->getDefaultImage();

            $imagesFiles = $form->getData()->getImages();

            $videos = $form->getData()->getVideos();

            $defaultImage = $this->fileUploader->upload($imageFile);

            foreach ($imagesFiles as $imageFile) {

                $images[] = $this->fileUploader->upload($imageFile);
            }

            if (!\count($form->getData()->getVideos->getUrl()) == 0) {


                }
                return true;
        }
        return false;
    }
}