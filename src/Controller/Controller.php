<?php
// ./src/Controller/Controller.php

namespace Imie\Controller;

use \Imie\View\View;

class Controller{

    private $em;

    public function __construct($em){
        $this->em = $em;
    }

    public function getDoctrine(){
        return $this->em;
    }

    public function render($folder, $file, $data = []){
        $view = new View($folder,$file);
        return $view->renderView($data);
    }

}