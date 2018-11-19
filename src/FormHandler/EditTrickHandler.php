<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 13/11/2018
 * Time: 11:48
 */

namespace App\FormHandler;


use App\Entity\Trick;
use App\FormHandler\Interfaces\EditTrickHandlerInterface;
use App\Repository\TrickRepository;
use App\Services\FileUploader;
use Symfony\Component\Form\FormInterface;

/**
 * Class EditTrickHandler
 * @package App\FormHandler
 */
final class EditTrickHandler implements EditTrickHandlerInterface
{

    /**
     * @var FileUploader
     */
    private $fileUploader;

    /**
     * @var TrickRepository
     */
    private $trickRepository;

    /**
     * EditTrickHandler constructor.
     * @param FileUploader $fileUploader
     * @param TrickRepository $trickRepository
     */
    public function __construct(
        FileUploader $fileUploader,
        TrickRepository $trickRepository
    ) {
        $this->fileUploader = $fileUploader;
        $this->trickRepository = $trickRepository;
    }


    /**
     * @param FormInterface $form
     * @param $user
     * @param Trick $trick
     * @return bool
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function handle(FormInterface $form, $user, Trick $trick)
    {

        if ($form->isSubmitted() && $form->isValid()) {

            //dd($form->getData());

            if ($form->getData()->getDefaultImage()->getFile()) {

                //dd($form->getData()->getDefaultImage());
                $defaultImage = $this->fileUploader->upload($form->getData()->getDefaultImage()->getFile());
                $form->getData()->getDefaultImage()->setUrl($defaultImage);

            }

            if ($form->getData()->getImages()) {

                $arrayCollectionImages = $form->getData()->getImages()->toArray();
                        //dd($form->getData()->getImages()->toArray());
                foreach ($arrayCollectionImages as $a => $image) {

                    $images = $this->fileUploader->upload($image->getFile());
                    $image->setUrl($images);
                }
            }


             if ($form->getData()->getVideos()) {

                 $arrayCollectionVideos = $form->getData()->getVideos()->toArray();

                 foreach ($arrayCollectionVideos as $b => $video) {

                     $videos[] = $video->getUrl();
                 }
             }

            $trick->setAuthor($user);
            $trick->setImages($form->getData()->getImages());
            $trick->setVideos($form->getData()->getVideos());
            $trick->setUpdatedAt(new \DateTime());
            $trick->setCategory($form->getData()->getCategory());

            $this->trickRepository->update();

                return true;
            }
            return false;
        }
}