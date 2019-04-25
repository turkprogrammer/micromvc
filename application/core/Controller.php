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

    public function __construct($route) {
        //echo "Base Controller Loaded <br/>";
        $this->route = $route;       
        $this->view = new View($route);//передаем $route в класс application\core\View
        $this->model = $this->loadModel($route['controller']);
    }
    
    public function loadModel($name){

        $path = 'application\models\\'.ucfirst($name); //loadmodel uppercase
        //debug(534);
        if(class_exists($path)){
            return new $path;
        }
      // debug($path);
    }
	

}
