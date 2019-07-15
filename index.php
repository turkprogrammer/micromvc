<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'application/lib/Dev.php';
require 'application/lib/Timer.php';
require 'application/lib/Red.php';
require 'vendor/autoload.php';
/**
Logging for PHP
*/
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

use application\core\Router;
Timer::start();

spl_autoload_register(function($class) {
    $path = str_replace('\\', '/', $class.'.php');
    if (file_exists($path)) {
        require $path;
    }
});

session_start();
$router = new Router();
$router->run();



// Create the logger
$logger = new Logger('my_logger');
// Now add some handlers
$logger->pushHandler(new StreamHandler(__DIR__.'/my_app.log', Logger::DEBUG));
$logger->pushHandler(new FirePHPHandler());



//echo "<pre>". substr(Timer::finish(), 0,-10) . ' сек.';