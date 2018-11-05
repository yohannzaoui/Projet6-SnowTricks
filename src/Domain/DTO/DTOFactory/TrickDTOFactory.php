<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 31/10/2018
 * Time: 11:59
 */

namespace App\Domain\DTO\DTOFactory;

use App\Domain\DTO\DTOFactory\Interfaces\CategoryDTOfactoryInterface;
use App\Domain\DTO\DTOFactory\Interfaces\DefaultImageDTOFactoryInterface;
use App\Domain\DTO\DTOFactory\Interfaces\ImageDTOFactoryInterface;
use App\Domain\DTO\DTOFactory\Interfaces\TrickDTOFactoryInterface;
use App\Domain\DTO\DTOFactory\Interfaces\VideoDTOFactoryInterface;
use App\Domain\DTO\NewUpdateTrickDTO;
use App\Domain\Models\Trick;

/**
 * Class TrickDTOFactory
 * @package App\Domain\DTO\DTOFactory
 */
class TrickDTOFactory implements TrickDTOFactoryInterface
{
    /**
     * @var DefaultImageDTOFactoryInterface
     */
    private $defaultImageDTOfactory;

    /**
     * @var ImageDTOFactoryInterface
     */
    private $imageDTOfactory;

    /**
     * @var VideoDTOFactoryInterface
     */
    private $videoDTOfactory;

    /**
     * @var CategoryDTOfactoryInterface
     */
    private $categoryDTOfactory;


    /**
     * TrickDTOFactory constructor.
     * @param DefaultImageDTOFactoryInterface $defaultImageDTOfactory
     * @param ImageDTOFactoryInterface $imageDTOfactory
     * @param VideoDTOFactoryInterface $videoDTOfactory
     * @param CategoryDTOfactoryInterface $categoryDTOfactory
     */
    public function __construct(
        DefaultImageDTOFactoryInterface $defaultImageDTOfactory,
        ImageDTOFactoryInterface $imageDTOfactory,
        VideoDTOFactoryInterface $videoDTOfactory,
        CategoryDTOfactoryInterface $categoryDTOfactory
    ) {
        $this->defaultImageDTOfactory = $defaultImageDTOfactory;
        $this->imageDTOfactory = $imageDTOfactory;
        $this->videoDTOfactory = $videoDTOfactory;
        $this->categoryDTOfactory = $categoryDTOfactory;
    }

    /**
     * @param Trick $trick
     * @return NewUpdateTrickDTO
     */
    public function create(Trick $trick)
    {

        $newDefaultImageDTO = $this->defaultImageDTOfactory->create($trick->getDefaultImage());

        $images [] = $trick->getImages()->toArray();
        $newImageDTO = [];
        foreach ($images as $image) {
            $newImageDTO [] = $this->imageDTOfactory->create($image);
        }

        $videos [] = $trick->getVideos()->toArray();
        $newVideoDTO = [];
        foreach ($videos as $video) {
            $newVideoDTO [] = $this->videoDTOfactory->create($video);
        }

        $newCategoryDTO = $this->categoryDTOfactory->create($trick->getCategory());


        return new NewUpdateTrickDTO(
            $trick->getAuthor(),
            $trick->getName(),
            $trick->getDescription(),
            $newDefaultImageDTO,
            $newImageDTO,
            $newVideoDTO,
            $newCategoryDTO
        );

    }
}