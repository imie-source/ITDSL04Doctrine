<?php
namespace Imie\Service;

class FlashBag{
    const ERROR = 'danger';
    const INFO = 'info';
    const SUCCESS = 'success';
    const WARNING = 'warning';
    private static $instance;

    private function __construct(){
        if(!isset($_SESSION['flashbag'])){
            $_SESSION['flashbag'] = [];
        }
    }

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new FlashBag();
        }
        return self::$instance;
    }

    public function addMessage($text, $type){
        $_SESSION['flashbag'][] = ["text" => $text, "type" => $type];
    }

    public function addError($text){
        $this->addMessage($text, self::ERROR);
    }

    public function addSuccess($text){
        $this->addMessage($text, self::SUCCESS);
    }

    public function addWarning($text){
        $this->addMessage($text, self::WARNING);
    }

    public function addInfo($text){
        $this->addMessage($text, self::INFO);
    }

    public function getMessages(){
        return $_SESSION['flashbag'];
    }

    public function clean(){
        $cleared = $_SESSION['flashbag'];
        $_SESSION['flashbag'] = [];

        return $cleared;
    }
}