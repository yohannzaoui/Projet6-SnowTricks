<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 16:25
 */

namespace App\FormHandler;


use App\Entity\Trick;
use App\Repository\TrickRepository;
use App\Services\FileUploader;
use Symfony\Component\Form\FormInterface;

class AddTrickHandler
{
    private $fileUploader;

    private $trickRepository;

    public function __construct(
        FileUploader $fileUploader,
        TrickRepository $trickRepository
    ) {
        $this->fileUploader = $fileUploader;
        $this->trickRepository = $trickRepository;
    }

    public function handle(FormInterface $form, $user, Trick $trick)
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $defaultImage = $this->fileUploader->upload($form->getData()->getDefaultImage());

            $arrayCollectionImages = $form->getData()->getImages()->toArray();

            foreach ($arrayCollectionImages as $a => $image) {

                $images = $this->fileUploader->upload($image->getFile());
                $image->setUrl($images);

            }

            $arrayCollectionVideos = $form->getData()->getVideos()->toArray();

            foreach ($arrayCollectionVideos as $b => $video) {

                $videos[] = $video->getUrl();
            }

            $trick->setAuthor($user);
            $trick->setDefaultImage($defaultImage);
            $trick->setImages($form->getData()->getImages());
            $trick->setVideos($form->getData()->getVideos());
            $trick->setCategory($form->getData()->getCategory());

            $this->trickRepository->save($trick);

            return true;
        }
        return false;
    }
}