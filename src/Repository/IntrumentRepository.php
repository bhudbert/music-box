<?php

namespace App\Repository;

use App\Entity\Intrument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Intrument|null find($id, $lockMode = null, $lockVersion = null)
 * @method Intrument|null findOneBy(array $criteria, array $orderBy = null)
 * @method Intrument[]    findAll()
 * @method Intrument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IntrumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Intrument::class);
    }

    // /**
    //  * @return Intrument[] Returns an array of Intrument objects
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
    public function findOneBySomeField($value): ?Intrument
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
