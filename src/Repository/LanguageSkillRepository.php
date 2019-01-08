<?php

namespace App\Repository;

use App\Entity\LanguageSkill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LanguageSkill|null find($id, $lockMode = null, $lockVersion = null)
 * @method LanguageSkill|null findOneBy(array $criteria, array $orderBy = null)
 * @method LanguageSkill[]    findAll()
 * @method LanguageSkill[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LanguageSkillRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LanguageSkill::class);
    }

    // /**
    //  * @return LanguageSkill[] Returns an array of LanguageSkill objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LanguageSkill
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
