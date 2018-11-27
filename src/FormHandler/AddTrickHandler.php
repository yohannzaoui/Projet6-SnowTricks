<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 16:25
 */

namespace App\FormHandler;


use App\Entity\Trick;
use App\FormHandler\Interfaces\AddTrickHandlerInterface;
use App\Repository\TrickRepository;
use App\Services\FileUploader;
use App\Services\Interfaces\SluggerInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class AddTrickHandler
 * @package App\FormHandler
 */
class AddTrickHandler implements AddTrickHandlerInterface
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
     * @var SluggerInterface
     */
    private $slugger;

    /**
     * AddTrickHandler constructor.
     * @param FileUploader $fileUploader
     * @param TrickRepository $trickRepository
     * @param SluggerInterface $slugger
     */
    public function __construct(
        FileUploader $fileUploader,
        TrickRepository $trickRepository,
        SluggerInterface $slugger
    ) {
        $this->fileUploader = $fileUploader;
        $this->trickRepository = $trickRepository;
        $this->slugger = $slugger;
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

            $defaultImage = $this->fileUploader->upload($form->getData()->getDefaultImage()->getFile());

            $form->getData()->getDefaultImage()->setUrl($defaultImage);
            
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
            $trick->setSlug($this->slugger->createSlug($form->getData()->getName()));
            $trick->setDefaultImage($form->getData()->getDefaultImage());
            $trick->setImages($form->getData()->getImages());
            $trick->setVideos($form->getData()->getVideos());
            $trick->setCategory($form->getData()->getCategory());

            $this->trickRepository->save($trick);

            return true;
        }
        return false;
    }
}