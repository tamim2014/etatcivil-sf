<?php

namespace App\Repository;

use App\Entity\Liste;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ListeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Liste::class);
    }
    // Pour tableNaissance.html.twig dans lectureBD.html.twig
    // src/Repository/ListeRepository.php
    public function findByPrefecture(string $prefecture): array
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.prefecture = :pref')
            ->setParameter('pref', $prefecture)
            ->getQuery()
            ->getResult();
    }

}




