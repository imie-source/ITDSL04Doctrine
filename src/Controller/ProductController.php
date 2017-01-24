<?php
// ./src/Controller/ProductController.php

namespace Imie\Controller;

use \Imie\Entity\Product;

class ProductController extends Controller{
    
    public function indexAction(){

        return $this->render('product', 'index', [
            "products" => $this->getDoctrine()
                                ->getRepository('\\Imie\\Entity\\Product')
                                ->findAll()
        ]);
    }

    public function addAction(){
        $msg = "";
        if(isset($_POST['name'])){
            $prod = new Product();
            $prod->setName(strip_tags($_POST['name']));

            $em = $this->getDoctrine();
            $em->persist($prod);
            $em->flush();

            $msg = $prod->getName() ." a bien été inséré.";
        }

        return $this->render('product', 'form', ["msg" => $msg]);
    }
}