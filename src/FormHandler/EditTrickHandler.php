<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 13/11/2018
 * Time: 11:48
 */

namespace App\FormHandler;


use App\Entity\Trick;
use App\Event\FileRemoverDefaultImageEvent;
use App\FormHandler\Interfaces\EditTrickHandlerInterface;
use App\Repository\TrickRepository;
use App\Services\FileRemover;
use App\Services\FileUploader;
use App\Services\Interfaces\SluggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class EditTrickHandler
 * @package App\FormHandler
 */
class EditTrickHandler implements EditTrickHandlerInterface
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
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var FileRemover
     */
    private $fileRemover;


    /**
     * EditTrickHandler constructor.
     * @param FileUploader $fileUploader
     * @param TrickRepository $trickRepository
     * @param SluggerInterface $slugger
     * @param EventDispatcherInterface $eventDispatcher
     * @param FileRemover $fileRemover
     */
    public function __construct(
        FileUploader $fileUploader,
        TrickRepository $trickRepository,
        SluggerInterface $slugger,
        EventDispatcherInterface $eventDispatcher,
        FileRemover $fileRemover
    ) {
        $this->fileUploader = $fileUploader;
        $this->trickRepository = $trickRepository;
        $this->slugger = $slugger;
        $this->eventDispatcher = $eventDispatcher;
        $this->fileRemover = $fileRemover;
    }


    /**
     * @param FormInterface $form
     * @param $author
     * @param Trick $trick
     * @return bool|mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function handle(FormInterface $form, $author, $trick)
    {

        if ($form->isSubmitted() && $form->isValid()) {

            if (!is_null($form->getData()->getDefaultImage())) {

                if (!is_null($form->getData()->getDefaultImage()->getFile())) {

                    $this->eventDispatcher->dispatch(
                        FileRemoverDefaultImageEvent::NAME,
                        new FileRemoverDefaultImageEvent($this->fileRemover, $form->getData()->getDefaultImage()->getUrl()));

                    $defaultImage = $this->fileUploader->upload(
                        $form->getData()
                            ->getDefaultImage()
                            ->getFile()
                    );

                    $form->getData()->getDefaultImage()->setUrl($defaultImage);
                }

            }


            if (!is_null($form->getData()->getImages())) {

                $imagesCollection = $form->getData()->getImages()->toArray();

                    foreach ($imagesCollection as $a => $image) {

                        if (!is_null($image->getFile())) {

                        $images = $this->fileUploader->upload($image->getFile());
                        $image->setUrl($images);
                        $image->setTrick($trick);
                    }

                }
            }

            if ($form->getData()->getVideos()) {

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
            $trick->setUpdatedAt(new \DateTime());

            $this->trickRepository->save($trick);

            return true;
            }
            return false;
        }
}