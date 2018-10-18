<?php

namespace App\Domain\Repository;

use App\Domain\Models\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;


/**
 * Class UserRepository
 * @package App\Domain\Repository
 */
class UserRepository extends ServiceEntityRepository implements UserLoaderInterface
{
    /**
     * UserRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * @param string $username
     * @return null|\Symfony\Component\Security\Core\User\UserInterface|void
     */
    public function loadUserByUsername($username)
    {
        // TODO: Implement loadUserByUsername() method.
    }

    /**
     * @param $token
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public Function checkRegistrationToken($token)
    {
        return  $this->createQueryBuilder('user')
                     ->where('user.token = :token')
                     ->setParameter('token', $token)
                     ->getQuery()
                     ->getOneOrNullResult();
    }

    /**
     * @param $email
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function checkEmail($email)
    {
        return $this->createQueryBuilder('user')
                    ->where('user.email = :email')
                    ->setParameter('email', $email)
                    ->getQuery()
                    ->getOneOrNullResult();
    }

    /**
     * @param $user
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save($user)
    {
        $this->_em->persist($user);
        $this->_em->flush();
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update()
    {
        $this->_em->flush();
    }

}
