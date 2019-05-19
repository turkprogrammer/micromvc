<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace application\core;

use application\core\View;

/**
 * Description of Controller
 *
 * @author Юнус
 */
abstract class Controller {

    //put your code here
    public $route;
    public $view;
    public $acl;

    public function __construct($route) {
        //echo "Base Controller Loaded <br/>";
        $this->route = $route;
       // $_SESSION['authorize']['id'] = 1;
       //debug($this->checkAcl());
        if(!$this->checkAcl()){
            View::errorCode(403);
        }
        $this->view = new View($route); //передаем $route в класс application\core\View
        $this->model = $this->loadModel($route['controller']);
    }

    public function loadModel($name) {

        $path = 'application\models\\' . ucfirst($name); //loadmodel uppercase
        //debug(534);
        if (class_exists($path)) {
            return new $path;
        }
    }

    public function checkAcl() {
        $this->acl = require 'application/acl/' . $this->route['controller'] . '.php'; //загружаем конфиг        
        if ($this->isAcl('all')) {
            return true;
        } elseif (isset($_SESSION['authorize']['id']) && $this->isAcl('authorize')) {
            return true;
        } elseif (!isset($_SESSION['authorize']['id']) && $this->isAcl('guest')) {
            return true;
        } elseif (isset($_SESSION['admin']) && $this->isAcl('admin')) {
            return true;
        }
        return false;
    }

    public function isAcl($key) {
        return in_array($this->route['action'], $this->acl[$key]);
    }

}
