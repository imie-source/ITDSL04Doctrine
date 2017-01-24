<?php
// ./src/Controller/ProductController.php

namespace Imie\Controller;

use \Imie\Entity\Product;

class ProductController extends Controller{
    
    // List products
    public function indexAction(){
        return $this->render('product', 'index', [
            "products" => $this->getDoctrine() // returns a doctrine object
                                ->getRepository('\\Imie\\Entity\\Product') // return a Product Repository
                                ->findAll() // Return a Product Entity list
        ]);
    }

    public function addAction(){
        $msg = "";
        // Check if we come from a form submission
        if(isset($_POST['name'])){
            // new Product object
            $prod = new Product();
            $prod->setName(strip_tags($_POST['name']));

            $em = $this->getDoctrine();
            // Tell Doctrine to take care of the $prod object
            $em->persist($prod); 
            // $prod is saved in database
            $em->flush();

            $msg = $prod->getName() ." a bien été inséré.";
        }

        return $this->render('product', 'form', ["msg" => $msg]);
    }
}