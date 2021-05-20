<?php

namespace App\Repository;

use App\Entity\RecipeUnit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecipeUnit|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecipeUnit|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecipeUnit[]    findAll()
 * @method RecipeUnit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipeUnitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecipeUnit::class);
    }

    // /**
    //  * @return RecipeUnit[] Returns an array of RecipeUnit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RecipeUnit
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
