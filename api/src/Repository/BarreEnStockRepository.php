<?php

namespace App\Repository;

use App\Entity\BarreEnStock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BarreEnStock>
 *
 * @method BarreEnStock|null find($id, $lockMode = null, $lockVersion = null)
 * @method BarreEnStock|null findOneBy(array $criteria, array $orderBy = null)
 * @method BarreEnStock[]    findAll()
 * @method BarreEnStock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BarreEnStockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BarreEnStock::class);
    }

    //    /**
    //     * @return BarreEnStock[] Returns an array of BarreEnStock objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?BarreEnStock
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
