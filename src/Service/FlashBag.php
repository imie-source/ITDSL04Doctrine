<?php
namespace Imie\Service;

class FlashBag{
    // messages types
    const ERROR = 'danger';
    const INFO = 'info';
    const SUCCESS = 'success';
    const WARNING = 'warning';
    private static $instance;

    // $_SESSION['flashbag'] initialisation
    private function __construct(){
        if(!isset($_SESSION['flashbag'])){
            $_SESSION['flashbag'] = [];
        }
    }

    // Singleton!
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new FlashBag();
        }
        return self::$instance;
    }

    // Generic addMessage function
    public function addMessage($text, $type){
        $_SESSION['flashbag'][] = ["text" => $text, "type" => $type];
    }

    // Create error message
    public function addError($text){
        $this->addMessage($text, self::ERROR);
    }

    // Create success message
    public function addSuccess($text){
        $this->addMessage($text, self::SUCCESS);
    }

    // Create warning message
    public function addWarning($text){
        $this->addMessage($text, self::WARNING);
    }

    // Create info message
    public function addInfo($text){
        $this->addMessage($text, self::INFO);
    }

    // Get all messages
    public function getMessages(){
        return $_SESSION['flashbag'];
    }

    // Delete all messages
    public function clean(){
        $cleared = $_SESSION['flashbag'];
        $_SESSION['flashbag'] = [];

        return $cleared;
    }
}