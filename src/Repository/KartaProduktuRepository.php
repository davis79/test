<?php

namespace App\Repository;

use App\Entity\KartaProduktu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method KartaProduktu|null find($id, $lockMode = null, $lockVersion = null)
 * @method KartaProduktu|null findOneBy(array $criteria, array $orderBy = null)
 * @method KartaProduktu[]    findAll()
 * @method KartaProduktu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KartaProduktuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KartaProduktu::class);
    }

    // /**
    //  * @return KartaProduktu[] Returns an array of KartaProduktu objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?KartaProduktu
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
