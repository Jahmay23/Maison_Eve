<?php

namespace App\Repository;

use App\Entity\Titres;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Titres>
 *
 * @method Titres|null find($id, $lockMode = null, $lockVersion = null)
 * @method Titres|null findOneBy(array $criteria, array $orderBy = null)
 * @method Titres[]    findAll()
 * @method Titres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TitresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Titres::class);
    }

//    /**
//     * @return Titres[] Returns an array of Titres objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Titres
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
