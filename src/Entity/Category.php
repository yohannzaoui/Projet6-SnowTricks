<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Orm\Entity
 */
class Category
{
    /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
    private $id;
}