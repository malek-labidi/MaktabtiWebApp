<?php

namespace App\Repository;

use App\Entity\Livre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Livre>
 *
 * @method Livre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Livre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Livre[]    findAll()
 * @method Livre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Livre::class);
    }

    public function save(Livre $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Livre $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Livre[] Returns an array of Livre objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }
   public function trier()
   {
       return $this->createQueryBuilder('l')
          
         
           ->orderBy('l.prix', 'ASC')
           ->setMaxResults(10)
           ->getQuery()
           
       ;
   }

   public function findOneBySomeField($value): ?array
   {
       return $this->createQueryBuilder('l')
           ->andWhere('l.titre = :val')
           ->setParameter('val', $value)
           ->getQuery()
           ->getResult()
       ;
   }
   public function livrehome()
{
    $events = $this->createQueryBuilder('l')
        
        ->setMaxResults(8)
        ->getQuery()
        ->getResult();

    return $events;
}

public function lastlivres()
{
    $events = $this->createQueryBuilder('l')
        ->orderBy('l.idLivre', 'DESC')
        ->setMaxResults(3)
        ->getQuery()
        ->getResult();

    return $events;
}

}
