<?php

namespace App\Repository;

use App\Entity\TypeDePieceIdentite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeDePieceIdentite>
 *
 * @method TypeDePieceIdentite|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeDePieceIdentite|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeDePieceIdentite[]    findAll()
 * @method TypeDePieceIdentite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeDePieceIdentiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeDePieceIdentite::class);
    }

    public function add(TypeDePieceIdentite $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TypeDePieceIdentite $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return TypeDePieceIdentite[] Returns an array of TypeDePieceIdentite objects
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

//    public function findOneBySomeField($value): ?TypeDePieceIdentite
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
