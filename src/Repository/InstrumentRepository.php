<?php

namespace App\Repository;

use App\Entity\Instrument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Instrument|null find($id, $lockMode = null, $lockVersion = null)
 * @method Instrument|null findOneBy(array $criteria, array $orderBy = null)
 * @method Instrument[]    findAll()
 * @method Instrument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InstrumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Instrument::class);
    }

     /**
     * @return Instrument[]
     */

    public function findInStock() : array
    {
        return $this->createQueryBuilder('i')
          ->where('i.stock>0')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Instrument[]
     */

    public function findPromoted() : array
    {return $this->createQueryBuilder('i')
        ->where('i.stock>0')
        ->andWhere('i.promoted=true')
        ->getQuery()
        ->getResult()
        ;

    }
}
