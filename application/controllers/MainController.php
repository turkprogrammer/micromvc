<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace application\controllers;

use application\core\Controller;

/**
 * Description of MainController
 *
 * @author Юнус
 */
class MainController extends Controller {

    //put your code here
    public function indexAction() {
      
        $city = $this->model->getCity();
        //debug($city);
        $data = [
            'header' => 'test MVC app',
            'city' => $city,
        ];

        $this->view->render('Microframework', $data);
    }

    public function contactAction() {
        $data = [
            'header' => 'Страница контактов',
        ];

        $this->view->render('Контакты', $data);
    }

}
