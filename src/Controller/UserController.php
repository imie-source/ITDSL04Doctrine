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

}