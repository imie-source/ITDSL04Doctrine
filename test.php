<?php
session_start();
ob_start();
echo "plop";
$content = ob_get_clean();
define('PATH', '');

class FlashBag{
    public function __construct(){
        // $_SESSION['flashbag'] = [
        //     [
        //         "text" => "plop",
        //         "type" => "success"
        //     ],
        //     [
        //         "text" => "plouf",
        //         "type" => "danger"
        //     ]
        // ];
    }
    function getMessages(){
        return $_SESSION['flashbag'];
    }

    function clean(){
        $_SESSION['flashbag'] = [];
    }
}

$flashbag = new FlashBag();
var_dump($_SESSION);

ob_start();
require('./src/View/layout.php');
ob_end_flush();

$flashbag->clean();


