<?php
// ./src/Controller/Controller.php

namespace Imie\Controller;

class Controller{

    private $em;

    public function __construct($em){
        $this->em = $em;
    }

    public function getDoctrine(){
        return $this->em;
    }

}