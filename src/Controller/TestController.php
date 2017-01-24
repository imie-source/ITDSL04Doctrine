<?php

namespace Imie\Controller;

use \Imie\Entity\Product;

class TestController extends Controller{

    public function indexAction(){

        $em = $this->getDoctrine();

        $product = new Product();
        $product->setName("Android 7");

        $em->persist($product);

        $em->flush();

        echo "Nouveau produit inséré :";
        var_dump($product);      
    }

}