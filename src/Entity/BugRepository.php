<?php

namespace Imie\Entity;

use Doctrine\ORM\EntityRepository;

class BugRepository extends EntityRepository{

    public function getAllBugsEager(){
        return $this->createQueryBuilder('b')
            ->join('b.engineer', 'e')
            ->join('b.reporter', 'r')
            ->join('b.products', 'p')
            ->getQuery()
            ->getResult();
    }

}