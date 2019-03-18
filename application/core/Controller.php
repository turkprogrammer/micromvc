<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace application\core;

/**
 * Description of Controller
 *
 * @author Юнус
 */
abstract class Controller {

    //put your code here
    public $route;

    public function __construct($route) {
        echo "Base Controller Loaded <br/>";
        $this->route = $route;
    }

}
