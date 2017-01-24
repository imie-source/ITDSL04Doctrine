<?php

namespace Imie\Controller;

use \Imie\Entity\Product;

// Used for test purpose
class TestController extends Controller{

    public function indexAction(){

        $em = $this->getDoctrine();

        $repo = $em->getRepository('\\Imie\\Entity\\Product');

        $products = $repo->findAll();

        var_dump($products);
    }

}