<?php
// ./src/Controller/DefaultController.php

namespace Imie\Controller;

use \Imie\View\View;

class DefaultController extends Controller
{
    public function indexAction(){
        $view = new View('default','index');
        return $view->renderView([]);
    }
}