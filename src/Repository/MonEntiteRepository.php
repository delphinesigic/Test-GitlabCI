<?php

namespace App\Repository;

use App\Entity\MonEntite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MonEntite|null find($id, $lockMode = null, $lockVersion = null)
 * @method MonEntite|null findOneBy(array $criteria, array $orderBy = null)
 * @method MonEntite[]    findAll()
 * @method MonEntite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MonEntiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MonEntite::class);
    }

    // /**
    //  * @return MonEntite[] Returns an array of MonEntite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MonEntite
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
