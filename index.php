<?php
// index.php

use Imie\Dispatcher;

require_once "vendor/autoload.php";
require_once "bootstrap.php";

define('_PUBLIC_PATH_', __DIR__ .'\\public\\');

const PATH = __DIR__;

$dispatch = new Dispatcher();
echo $dispatch->dispatch();




