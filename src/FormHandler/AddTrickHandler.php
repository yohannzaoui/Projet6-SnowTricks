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
     * @param Trick $trick
     * @param $author
     * @param FormInterface $form
     * @return bool|mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function handle(Trick $trick, $author, FormInterface $form)
    {

        if ($form->isSubmitted() && $form->isValid()) {

            if ($form->getData()->getDefaultImage()) {

                $defaultImage = $this->fileUploader->upload(
                    $form->getData()
                        ->getDefaultImage()
                        ->getFile()
                );

                $form->getData()->getDefaultImage()->setUrl($defaultImage);
            }



            if (!is_null($form->getData()->getImages())) {

                $imagesCollection = $form->getData()->getImages()->toArray();

                foreach ($imagesCollection as $a => $image) {

                    $images = $this->fileUploader->upload($image->getFile());

                    $image->setUrl($images);
                    $image->setTrick($trick);
                }
            }

            if (!is_null($form->getData()->getVideos())) {

                $videosCollection = $form->getData()->getVideos()->toArray();

                foreach ($videosCollection as $b => $video) {

                    $videos[] = $video->getUrl();
                    $video->setTrick($trick);

                }
            }

            $trick->setAuthor($author);
            $trick->setName($form->getData()->getname());
            $trick->setDescription($form->getData()->getDescription());
            $trick->setSlug($this->slugger->createSlug($form->getData()->getname()));
            $trick->setCategory($form->getData()->getCategory());

            $this->trickRepository->save($trick);

            return true;
        }
        return false;
    }
}