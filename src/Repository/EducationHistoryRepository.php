<?php

namespace App\Repository;

use App\Entity\EducationHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EducationHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method EducationHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method EducationHistory[]    findAll()
 * @method EducationHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EducationHistoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EducationHistory::class);
    }

    // /**
    //  * @return EducationHistory[] Returns an array of EducationHistory objects
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
    public function findOneBySomeField($value): ?EducationHistory
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
