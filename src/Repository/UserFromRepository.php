<?php

namespace App\Repository;

use App\Entity\UserFrom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserFrom>
 *
 * @method UserFrom|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserFrom|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserFrom[]    findAll()
 * @method UserFrom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserFromRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserFrom::class);
    }

//    /**
//     * @return UserFrom[] Returns an array of UserFrom objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UserFrom
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
