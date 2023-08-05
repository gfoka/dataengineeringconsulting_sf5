<?php

namespace App\Repository;

use App\Entity\CarteVisaPrepayee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CarteVisaPrepayee>
 *
 * @method CarteVisaPrepayee|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarteVisaPrepayee|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarteVisaPrepayee[]    findAll()
 * @method CarteVisaPrepayee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarteVisaPrepayeeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarteVisaPrepayee::class);
    }

    public function add(CarteVisaPrepayee $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CarteVisaPrepayee $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CarteVisaPrepayee[] Returns an array of CarteVisaPrepayee objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CarteVisaPrepayee
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
