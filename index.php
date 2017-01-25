<?php
// index.php
session_start();

use Imie\Dispatcher;

require_once "vendor/autoload.php";
require_once "bootstrap.php";

define('_PUBLIC_PATH_', __DIR__ .'\\public\\');

$path = explode(DIRECTORY_SEPARATOR, __DIR__);
define('PATH', '/' . $path[sizeof($path)-1]);

$dispatch = new Dispatcher($em);
echo $dispatch->dispatch();




