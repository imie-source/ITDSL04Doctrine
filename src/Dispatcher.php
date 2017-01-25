<?php
// ./src/Dispatcher.php

namespace Imie;

use Imie\Controller\DefaultController;

class Dispatcher
{
    private $url;
    private $method;
    private $result;
    private $defControl;
    private $em;

    public function __construct($em)
    {
        $this->em = $em; // <-- Doctrine object
        $this->url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : null;
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->defControl = new DefaultController($this->em);
    }

    public function dispatch()
    {
        $flag = true;
        if(!is_null($this->url)){
            $this->match($this->url);
            if(isset($this->result[2]) && isset($this->result[3])) {
                $path = __DIR__ . DIRECTORY_SEPARATOR .'Controller' . DIRECTORY_SEPARATOR . ucfirst($this->result[2]) . 'Controller.php';
                $controller = '\\Imie\\Controller\\' . ucfirst($this->result[2]) . 'Controller';
                $action = $this->result[3] . 'Action';
                if (file_exists($path)) {
                    // Don't forget to give Doctrine to the controller
                    $theController = new $controller($this->em);
                    if (method_exists($theController, $action)) {
                        $flag = false;
                        return $theController->$action($this->result);
                    }
                }
            }
        }

        if($flag){
            return $this->defControl->indexAction();
        }            
    }

    // Split (/) url in array and store it in $this->result
    private function match($url){
        $pattern = '/\//';
        $url = trim($url,'\/');
        $this->result = preg_split($pattern,$url);
    }
}