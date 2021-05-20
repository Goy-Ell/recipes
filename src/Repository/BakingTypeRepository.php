<?php

namespace App\Repository;

use App\Entity\BakingType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BakingType|null find($id, $lockMode = null, $lockVersion = null)
 * @method BakingType|null findOneBy(array $criteria, array $orderBy = null)
 * @method BakingType[]    findAll()
 * @method BakingType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BakingTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BakingType::class);
    }

    // /**
    //  * @return BakingType[] Returns an array of BakingType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BakingType
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
