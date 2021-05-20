<?php

namespace App\Repository;

use App\Entity\IngredientUnit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IngredientUnit|null find($id, $lockMode = null, $lockVersion = null)
 * @method IngredientUnit|null findOneBy(array $criteria, array $orderBy = null)
 * @method IngredientUnit[]    findAll()
 * @method IngredientUnit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IngredientUnitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IngredientUnit::class);
    }

    // /**
    //  * @return IngredientUnit[] Returns an array of IngredientUnit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IngredientUnit
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
