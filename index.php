<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'application/lib/Dev.php';

use application\core\Router;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

session_start();
$router = new Router();
$router->run();

