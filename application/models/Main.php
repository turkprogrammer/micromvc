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

class Main extends Model {

    public function getCity() {
        $params = ['phone' => '+44 20 7877 2041',
        ];
        $result = $this->db->row('SELECT city, phone, country, officeCode From offices', $params);

        return $result;
    }

}
