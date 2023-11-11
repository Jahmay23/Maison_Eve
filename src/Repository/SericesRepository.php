<?php

namespace App\Repository;

use App\Entity\Serices;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Serices>
 *
 * @method Serices|null find($id, $lockMode = null, $lockVersion = null)
 * @method Serices|null findOneBy(array $criteria, array $orderBy = null)
 * @method Serices[]    findAll()
 * @method Serices[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SericesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Serices::class);
    }

//    /**
//     * @return Serices[] Returns an array of Serices objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Serices
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
