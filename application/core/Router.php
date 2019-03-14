<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace application\core;

class Router {

    protected $routes = [];
    protected $params = [];

    function __construct() {
       $arr = require 'application/config/routes.php'; // loading config
      // debug($arr);
      foreach ($arr as $key => $value) {
          $this->add($key, $value);
      }
    }

    public function add($route, $params) {
       $route = '';
    }

    public function match() {
        
    }

    public function run() {
        echo 'Run';
    }

}
