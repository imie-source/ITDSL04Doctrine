<?php
// ./src/Controller/DefaultController.php

namespace Imie\Controller;

use \Imie\View\View;

// Default controller is called when the route is not found
class DefaultController extends Controller
{
    public function indexAction(){
        // first argument is the folder, second the template
        $view = new View('default','index');
        return $view->renderView([]);
    }
}