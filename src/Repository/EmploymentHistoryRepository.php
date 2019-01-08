<?php

namespace App\Repository;

use App\Entity\EmploymentHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EmploymentHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmploymentHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmploymentHistory[]    findAll()
 * @method EmploymentHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmploymentHistoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EmploymentHistory::class);
    }

    // /**
    //  * @return EmploymentHistory[] Returns an array of EmploymentHistory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EmploymentHistory
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
