<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Orm\Entity
 */
class Trick
{
    /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
    private $id;

    /**
   * @ORM\Column(name="name", type="string", length=255)
   */
    private $name;

    /**
   * @ORM\Column(name="description", type="text", length=255)
   */
    private $description;

    /**
   * @ORM\Column(name="image", type="string", length=255)
   */
    private $image;

    /**
   * @ORM\Column(name="video", type="string", length=255)
   */
    private $video;

    /**
     * @ORM\Column(name="comment", type="integer")
     */
    private $comment;

    /**
     * @ORM\Column(name="category", type="integer")
     */
    private $category;

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of video
     */ 
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set the value of video
     *
     * @return  self
     */ 
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }
}