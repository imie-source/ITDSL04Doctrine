<?php

namespace Imie\Entity;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository{

   public function getProductWithBugs($id){
       return $this->createQueryBuilder('p')
            ->leftJoin('p.bugs', 'b')
            ->join('b.engineer', 'e')
            ->join('b.reporter', 'r')
            ->join('b.products', 'bp')
            ->where('b.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
   }
}