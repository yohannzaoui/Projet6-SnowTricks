<?php

namespace App\Repository;

use App\Entity\User;
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
     * @param $image
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function checkProfilImage($image)
    {
        return $this->createQueryBuilder('u')
                    ->select('u.profilImage')
                    ->where('u.profilImage = ?1')
                    ->setParameter(1, $image)
                    ->getQuery()
                    ->getOneOrNullResult();

    }


    /**
     * @param $profilImage
     * @param $username
     */
    public function updateProfilImage($profilImage, $id)
    {
        $qb = $this->createQueryBuilder('u');
        $qb->update(User::class, 'u')
            ->set('u.profilImage', '?1')
            ->where('u.id = ?2')
            ->setParameter(1, $profilImage)
            ->setParameter(2, $id);
        $q = $qb->getQuery();
        $q->execute();
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getUser($id)
    {
        return $this->createQueryBuilder('u')
            ->where('u.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }


    /**
     * @return mixed
     */
    public function getAllUsersForAdmin()
    {
        return $this->createQueryBuilder('u')
            //->where('u.token = ?1')
            //->setParameter(1, "ROLE_USER")
            ->orderBy('u.createdAt','DESC')
            //->setParameter(1, null)
            ->getQuery()
            ->getResult();
    }

    /**
     * @param $token
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public Function checkRegistrationToken($token):? User
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
     * @param $token
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function checkResetToken($token)
    {
        return  $this->createQueryBuilder('user')
            ->where('user.resetPasswordToken = :token')
            ->setParameter('token', $token)
            ->getQuery()
            ->getOneOrNullResult();
    }


    /**
     * @param $token
     * @param $password
     */
    public function resetPassword($token, $password)
    {
        $qb = $this->createQueryBuilder('user');
        $qb->update(User::class, 'u')
            ->set('u.password', '?1')
            ->set('u.resetPasswordToken', 'null')
            ->where('u.resetPasswordToken = ?2')
            ->setParameter(1, $password)
            ->setParameter(2, $token);
        $q= $qb->getQuery();
        $q->execute();
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

    /**
     * @param $email
     * @param $token
     */
    public function saveResetToken($email, $token)
    {
        $qb = $this->createQueryBuilder('user');
        $qb->update(User::class, 'u')
            ->set('u.resetPasswordToken', '?1')
            ->where('u.email = ?2')
            ->setParameter(1, $token)
            ->setParameter(2, $email);
        $q= $qb->getQuery();
        $q->execute();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->_em->createQueryBuilder()
            ->delete(User::class, 'u')
            ->where('u.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->execute();
    }

}