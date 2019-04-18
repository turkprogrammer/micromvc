<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'application/lib/Dev.php';
require 'application/lib/Timer.php';

use application\core\Router;
Timer::start();
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

session_start();
$router = new Router();
$router->run();

echo "<code>". substr(Timer::finish(), 0,-10) . ' сек.';