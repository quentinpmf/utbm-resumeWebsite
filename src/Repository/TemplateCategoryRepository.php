<?php

namespace App\Repository;

use App\Entity\TemplateCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TemplateCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method TemplateCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method TemplateCategory[]    findAll()
 * @method TemplateCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TemplateCategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TemplateCategory::class);
    }

    // /**
    //  * @return TemplateCategory[] Returns an array of TemplateCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TemplateCategory
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
