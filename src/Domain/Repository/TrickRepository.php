<?php

namespace App\Domain\Repository;

use App\Domain\Models\Trick;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\EntityRepository;

/**
 * 
 */
class TrickRepository extends EntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Trick::class);
    }

}

