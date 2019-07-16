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
        R::freeze( true ); // Режим заморозки в RedBeanPHP нужен для того, чтобы включить или выключить поведение автоматического создания
        // и изменения таблиц в БД. Сервер сильно нагружается, поэтому, когда Вы разрабатываете сайт, то режим заморозки можно выключить (false). 
        // Тогда автоматическое создание таблиц будет работать. Когда Вы зальете готовый сайт на хостинг, то нужно поставить режим заморозки в
        //  значение true.

// Проверка подключения к БД
        if (!R::testConnection()) {
            die('No DB connection!!!!');
        }
         R::close();
    }

}
