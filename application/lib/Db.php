<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Db
 *
 * @author Юнус
 */

namespace application\lib;

use PDO; // подключаем пдо

class Db {

    protected $db;

    function __construct() {
        $config = require 'application/config/db.php';
        try {
            $this->db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['name'] . ';charset=utf8', $config['user'], $config['password']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        //debug($config);
    }

    public function query($sql, $params = []) {
        $stmnt = $this->db->prepare($sql, $params);
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $stmnt->bindValue(':' . $key, $value);
            }
            $stmnt->execute();
            return $stmnt;
        }

        //debug($result);
    }

    public function row($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }

}
