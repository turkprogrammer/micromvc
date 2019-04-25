<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace application\core;

use application\lib\Db;

/**
 * Description of Model
 *
 * @author Юнус
 */
abstract class Model {

    //put your code here
    public $db;

    public function __construct() {
        $this->db = new Db;
    }

}
