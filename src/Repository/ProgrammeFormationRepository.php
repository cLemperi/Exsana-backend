<?php

namespace App\Repository;

use App\Entity\ProgrammeFormation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProgrammeFormation>
 *
 * @method ProgrammeFormation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProgrammeFormation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProgrammeFormation[]    findAll()
 * @method ProgrammeFormation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProgrammeFormationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProgrammeFormation::class);
    }

//    /**
//     * @return ProgrammeFormation[] Returns an array of ProgrammeFormation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ProgrammeFormation
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
