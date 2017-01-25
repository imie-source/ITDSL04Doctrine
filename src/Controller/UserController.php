<?php

namespace Imie\Controller;

use \Imie\Entity\User;

class UserController extends Controller{

    public function indexAction(){

        $em = $this->getDoctrine();
        $userRepo = $em->getRepository('Imie\Entity\User');

        return $this->render('user', 'index', [
            "users" => $userRepo->findAll()
        ]);
        
    }

    // Add form & submission
    public function addAction($args){
        $user = new User();
        $em = $this->getDoctrine();
        $modif = isset($args[2]);

        if($modif){
            $repo = $em->getRepository('Imie\Entity\User');
            $user = $repo->find($args[2]);

            if(is_null($user)){
                header('Location: ' . PATH . '/index.php');
            }
        }
        
        // Check if we come from a form submission
        if(isset($_POST['name'])){
            // new User object
            $user->setName(strip_tags($_POST['name']));
            // Tell Doctrine to take care of the $user object
            $em->persist($user); 
            // $user is saved in database
            $em->flush();

            header('Location: ' . PATH . '/index.php/user/index');
        }

        return $this->render('user', 'form', [
            "user" => $user
        ]);
    }

}