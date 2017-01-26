<?php

namespace Imie\Entity;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository{

    public function getUserWithBugs($id){
        $em = $this->getEntityManager();

        $query = $em->createQuery('SELECT u, a, r FROM Imie\Entity\User u '
                                    . 'LEFT JOIN u.assignedBugs a ' 
                                    . 'LEFT JOIN u.reportedBugs r '
                                    . 'WHERE u.id = :id');
        $query->setParameter('id', $id);

        return $query->getSingleResult();
    }

    public function getUserWithBugsQB($id){
        return $this->createQueryBuilder('u')
            ->addSelect('a')
            ->addSelect('r')
            ->leftJoin('u.assignedBugs', 'a')
            ->leftJoin('u.reportedBugs', 'r')
            ->where('u.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getAllUsersOrdered(){
        return $this->createQueryBuilder('u')
            ->orderBy('u.name')
            ->getQuery()
            ->getResult();
    }
}