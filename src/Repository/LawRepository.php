<?php
/**
 * Created by PhpStorm.
 * User: gweltaz
 * Date: 25/11/2018
 * Time: 08:46
 */

namespace App\Repository;


use App\Entity\Law;
use App\Entity\LawVote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping;
use Symfony\Bridge\Doctrine\RegistryInterface;

class LawRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Law::class);
    }

    public function findAllSortByVotes() {
        $query = $this->createQueryBuilder("p")
            ->join("p.votes","v")
            ->groupBy("p.uuid")
            ->orderBy('count(p.uuid)', 'ASC')
            ->getQuery();

        return $query->execute();
    }
}