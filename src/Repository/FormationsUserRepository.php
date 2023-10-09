<?php

namespace App\Repository;

use App\Entity\FormationsUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FormationsUser>
 *
 * @method FormationsUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormationsUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormationsUser[]    findAll()
 * @method FormationsUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormationsUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormationsUser::class);
    }

//    /**
//     * @return FormationsUser[] Returns an array of FormationsUser objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FormationsUser
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
