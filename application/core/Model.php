<?php

/*
 * RedBeanPHP
 */

namespace application\core;

use R; //RedBeanPHP

/**
 * Description of Model
 *
 * @author Юнус
 */

abstract class Model {

    public function __construct() {

        $config = require 'application/config/db.php';
        R::setup('mysql:host=' . $config['host'] . ';dbname=' . $config['name'] . ';charset=utf8', $config['user'], $config['password']);

// Проверка подключения к БД
        if (!R::testConnection()) {
            die('No DB connection!!!!');
        }
    }

}
