<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Main
 *
 * @author Юнус
 */

namespace application\models;
use application\core\Model;
use R;

class Main extends Model {

    /**
     * 
     * @return type
     * Вернёт массив данных (все записи/несколько по условию) из указанной таблицы
     */
    public static function getCity() {
        $result = R::getAll('SELECT category_id, name FROM category');
        return $result;
    }

}
