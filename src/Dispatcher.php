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

    public function __construct()
    {
        $this->url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : null;
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->defControl = new DefaultController();
    }

    public function dispatch()
    {
        $flag = true;
        if(!is_null($this->url)){
            $this->match($this->url);
            if(isset($this->result[0]) && isset($this->result[1])) {
                $path = __DIR__ . '\\Controller\\' . ucfirst($this->result[0]) . 'Controller.php';
                $controller = '\\Imie\\Controller\\' . ucfirst($this->result[0]) . 'Controller';
                $action = $this->result[1] . 'Action';
                if (file_exists($path)) {
                    $theController = new $controller();
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

    private function match($url){
        $pattern = '/\//';
        $url = trim($url,'\/');
        $this->result = preg_split($pattern,$url);
    }
}