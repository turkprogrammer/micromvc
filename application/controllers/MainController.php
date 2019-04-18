<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

/**
 * Description of MainController
 *
 * @author Юнус
 */
class MainController extends Controller {

    //put your code here
    public function indexAction() {
       /* $db = new Db();
        $params = [
            'productCode' => 'S10_2016',
        ];

        $data = $db->column("select productName from products where productCode = :productCode", $params);
        //debug($data);*/
        $data = [
            'header'=>'test MVC app',
        ];
        $this->view->render('Microframework', $data);
    }

    public function contactAction() {
       // echo 'Контакты';
    }

}
