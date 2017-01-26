<?php

namespace Imie\Controller;

use \Imie\Entity\Bug;
use \Imie\Entity\User;
use \Imie\Entity\Product;

class BugController extends Controller{

    public function indexAction(){
        $em = $this->getDoctrine();
        $bugRepo = $em->getRepository('Imie\Entity\Bug');

        return $this->render('bug', 'index', [
            "bugs" => $bugRepo->findAll() // fetch all bugs
        ]);
    }

    public function changeAction($args){
        $em = $this->getDoctrine();
        $bugRepo = $em->getRepository('Imie\Entity\Bug');

        $bug = $bugRepo->find($args[2]);

        // If bug can't be found, redirect'
        if(is_null($bug)){
            header('Location: ' . PATH . 'index.php');
            return;
        }

        // Change status
        if($bug->getStatus() === 'Ouvert'){
            $bug->close();
            $this->getFlashBag()->addSuccess('Le bug a bien été fermé.');
        }
        else{
            $bug->open();
            $this->getFlashBag()->addSuccess('Le bug a bien été ouvert.');
        }

        // Change in database
        $em->flush();

        header('Location: ' . $_SERVER["HTTP_REFERER"]); // Back to previous page
    }

    // Add form & submission
    public function addAction($args){
        $bug = new Bug();
        $em = $this->getDoctrine();
        $modif = isset($args[2]);

        $userRepo = $em->getRepository('Imie\Entity\User');
        $productRepo = $em->getRepository('Imie\Entity\Product');

        // if($modif){
        //     $bugRepo = $em->getRepository('Imie\Entity\Bug');
        //     $bug = $bugRepo->find($args[2]);

        //     if(is_null($bug)){
        //         header('Location: ' . PATH . '/index.php');
        //         return;
        //     }
        // }
        
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
            // $bug is saved in database
            $em->flush();

            $this->getFlashBag()->addSuccess("Le bug n°" . $bug->getId() . " a bien été " . ($modif ? "modifié." : "sauvegardé."));

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