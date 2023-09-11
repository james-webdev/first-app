<?php

namespace App\Repository;

use App\Entity\SymfonyCasts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SymfonyCasts>
 *
 * @method SymfonyCasts|null find($id, $lockMode = null, $lockVersion = null)
 * @method SymfonyCasts|null findOneBy(array $criteria, array $orderBy = null)
 * @method SymfonyCasts[]    findAll()
 * @method SymfonyCasts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SymfonyCastsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SymfonyCasts::class);
    }

    public function save(SymfonyCasts $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SymfonyCasts $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SymfonyCasts[] Returns an array of SymfonyCasts objects
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

//    public function findOneBySomeField($value): ?SymfonyCasts
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
