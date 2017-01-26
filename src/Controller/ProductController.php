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

    public function detailAction($args){
        $em = $this->getDoctrine();

        $repo = $em->getRepository('\Imie\Entity\Product');

        $product = $repo->find($args[2]);

        if(is_null($product)){
            header('Location: ' . PATH . '/index.php');
        }

        return $this->render('product', 'detail', [
            "product" => $product            
        ]);
    }

    // Remove a product with id passed in url
    public function removeAction($args){
        $em = $this->getDoctrine();
        $repo = $em->getRepository('\Imie\Entity\Product');

        $prod = $repo->find($args[2]);

        if(isset($prod)){
            $em->remove($prod);
            $em->flush();
        }

        header('Location: ' . PATH . '/index.php/product/index');

    }

    // Add form & submission
    public function addAction($args){
        $prod = new Product();
        $em = $this->getDoctrine();
        $modif = isset($args[2]);

        if($modif){
            $repo = $em->getRepository('Imie\Entity\Product');
            $prod = $repo->find($args[2]);

            if(is_null($prod)){
                header('Location: ' . PATH . '/index.php');
            }
        }
        
        $msg = "";
        // Check if we come from a form submission
        if(isset($_POST['name'])){
            // new Product object
            $prod->setName(strip_tags($_POST['name']));
            // Tell Doctrine to take care of the $prod object
            $em->persist($prod); 
            // $prod is saved in database
            $em->flush();

            header('Location: ' . PATH . '/index.php/product/index');
        }

        return $this->render('product', 'form', [
            "msg" => $msg,
            "product" => $prod
        ]);
    }
}