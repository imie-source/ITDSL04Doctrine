<?php

namespace Imie\Entity;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository{

   public function getProductWithBugs($id){
       return $this->createQueryBuilder('p')
            ->addSelect('b')
            ->leftJoin('p.bugs', 'b')
            ->where('b.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
   }

}