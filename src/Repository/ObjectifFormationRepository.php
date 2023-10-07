<?php

namespace App\Repository;

use App\Entity\ObjectifFormation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ObjectifFormation>
 *
 * @method ObjectifFormation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ObjectifFormation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ObjectifFormation[]    findAll()
 * @method ObjectifFormation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ObjectifFormationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ObjectifFormation::class);
    }

//    /**
//     * @return ObjectifFormation[] Returns an array of ObjectifFormation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ObjectifFormation
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
