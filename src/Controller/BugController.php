<?php

namespace Imie\Controller;

use \Imie\Entity\Bug;
use \Imie\Entity\User;
use \Imie\Entity\Product;

class BugController extends Controller{

    public function indexAction(){
        
    }

    // Add form & submission
    public function addAction($args){
        $bug = new Bug();
        $em = $this->getDoctrine();
        $modif = isset($args[2]);

        $userRepo = $em->getRepository('Imie\Entity\User');
        $productRepo = $em->getRepository('Imie\Entity\Product');

        if($modif){
            $bugRepo = $em->getRepository('Imie\Entity\Bug');
            $bug = $bugRepo->find($args[2]);

            if(is_null($bug)){
                header('Location: ' . PATH . '/index.php');
                return;
            }
        }
        
        // Check if we come from a form submission
        if(isset($_POST['description'], $_POST['engineer'], $_POST['reporter'], $_POST['products'])){

            $bug->setDescription(htmlentities($_POST['description']))
                ->setEngineer($userRepo->find($_POST['engineer']))
                ->setReporter($userRepo->find($_POST['reporter']));
            // Add each products
            foreach($_POST['products'] as $product){
                $bug->addProduct($productRepo->find($product));
            }
            // Tell Doctrine to take care of the $user object
            $em->persist($bug); 
            // $user is saved in database
            $em->flush();

            header('Location: ' . PATH . '/index.php/bug/index');
            return;
        }

        return $this->render('bug', 'form', [
            "bug" => $bug,
            "users" => $userRepo->findAll(),
            "products" => $productRepo->findAll()
        ]);
    }

}