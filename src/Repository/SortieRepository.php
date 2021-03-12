<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Sortie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sortie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sortie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sortie[]    findAll()
 * @method Sortie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SortieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sortie::class);
    }

     /**
     * @return Sortie[] Returns an array of Sortie objects
      */
    public function findSearch(SearchData $search) : array
    {
        $query = $this
            ->createQueryBuilder('s')
            ->select('c', 's', 'cs')
            ->join('s.categorie', 'c')
            ->join('s.campusSortie', 'cs');

        if(!empty($search->query)){
            $query = $query
                ->andWhere('s.nom LIKE :query')
                ->setParameter('query', "%{$search->query}%");
        }

        if(!empty($search->orga)){
            $query = $query
                ->andWhere('s.organisateur = 1');
        }

        if(!empty($search->inscrit)) {
            $query = $query
                ->andWhere('s.inscrits = 1');
        }

        if(!empty($search->terminee)) {
            $query = $query
                ->andWhere('s.etat = 1');
        }

        if(!empty($search->categories)){
            $query = $query
                ->andWhere('c.id IN (:categorie)')
                ->setParameter('categorie', $search->categories);
        }

        if(!empty($search->campus)){
            $query = $query
                ->andWhere('cs.id IN (:campusSortie)')
                ->setParameter('campusSortie', $search->campus);
        }



        return $query->getQuery()->getResult();



    }


    /*
    public function findOneBySomeField($value): ?Sortie
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
