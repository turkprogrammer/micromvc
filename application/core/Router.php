<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace application\core;
use application\core\View;

class Router {

    protected $routes = [];
    protected $params = [];

    public function __construct() {
        $arr = require 'application/config/routes.php'; // loading config
        // debug($arr);
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    public function add($route, $params) {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    public function match() {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run() {
        if ($this->match()) {
            $path = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
           
            if (class_exists($path)) {
                $action = $this->params['action'] . 'Action';
                if (method_exists($path, $action)) {
                   $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    //echo 'Метод не найден: ' . $action;
                    View::errorCode(404);
                }
            } else {
                //echo 'Не найден контроллер: ' . $path;
                View::errorCode(404);
            }
        } else {
            //echo 'Маршрут не найден'.$_SERVER['REQUEST_URI'];
            View::errorCode(404);
           
        }
    }

}
