<?php

namespace Imie\Controller;

use \Imie\Entity\User;
use \Imie\Entity\Product;
use \Imie\Entity\Bug;

// Used for test purpose
class TestController extends Controller{

    public function indexAction(){

        $em = $this->getDoctrine();
        $userRepo = $em->getRepository('Imie\Entity\User');
        $productRepo = $em->getRepository('Imie\Entity\Product');

        $bug = new Bug();

        $bug->setDescription("Plus rien ne marche...");

        $bug->setReporter($userRepo->find(1));
        $bug->setEngineer($userRepo->find(2));

        $bug->addProduct($productRepo->find(1));

        $em->persist($bug);

        $em->flush();

        var_dump($bug);
        
    }

}