<?php

namespace Imie\Controller;

use \Imie\Entity\User;

class UserController extends Controller{

    public function indexAction(){

        $em = $this->getDoctrine();
        $userRepo = $em->getRepository('Imie\Entity\User');

        return $this->render('user', 'index', [
            "users" => $userRepo->getAllUsersOrdered()
        ]);
        
    }

    // Add form & submission
    // This action is also used for update
    public function addAction($args){
        $user = new User();
        $em = $this->getDoctrine();
        $modif = isset($args[2]);

        if($modif){
            $repo = $em->getRepository('Imie\Entity\User');
            $user = $repo->find($args[2]);

            if(is_null($user)){
                header('Location: ' . PATH . '/index.php');
                return;
            }
        }
        
        // Check if we come from a form submission
        if(isset($_POST['name'])){
            // set user attributes
            $user->setName(strip_tags($_POST['name']));
            // Tell Doctrine to take care of the $user object
            $em->persist($user); 
            // $user is saved in database
            $em->flush();
            $this->getFlashBag()->addSuccess($user->getName() . " a bien été " . ($modif ? "modifié." : "sauvegardé."));

            header('Location: ' . PATH . '/index.php/user/index');
            return;
        }

        return $this->render('user', 'form', [
            "user" => $user
        ]);
    }

    // Remove a user with id passed in url
    public function removeAction($args){
        $em = $this->getDoctrine();
        $repo = $em->getRepository('\Imie\Entity\User');

        // Find user in repository
        $user = $repo->find($args[2]);

        // Remove it if it exists
        if(isset($user)){
            $em->remove($user);
            $em->flush();
            $this->getFlashBag()->addSuccess($user->getName() . " a bien été supprimé.");
        }

        // users list redirection
        header('Location: ' . PATH . '/index.php/user/index');

    }

    // Show users detail
    public function detailAction($args){
        $em = $this->getDoctrine();
        $repo = $em->getRepository('\Imie\Entity\User');

        // Find user in repository
        // $user = $repo->find((int)$args[2]);

        $user = $repo->getUserWithBugsQB($args[2]);

        // Redirection if user does not exists
        if(!isset($user)){
            $this->getFlashBag()->addError("L'utilisateur n'existe pas.");
            header('Location: ' . PATH . '/index.php/user/index');
            die();
        }

        // render user detail view
        return $this->render('user', 'detail', [
            "user" => $user
        ]); 
    }
}