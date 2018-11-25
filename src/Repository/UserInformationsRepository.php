<?php

namespace App\Repository;

use App\Entity\UserInformations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserInformations|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserInformations|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserInformations[]    findAll()
 * @method UserInformations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserInformationsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserInformations::class);
    }

    // /**
    //  * @return UserInformations[] Returns an array of UserInformations objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserInformations
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
