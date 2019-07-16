<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace application\controllers;

use application\core\Controller;
use application\models\Main;

/**
 * Description of MainController
 *
 * @author Юнус
 */
class MainController extends Controller {

    //put your code here
    public function indexAction() {
        //$city = \application\models\Main::getCity();

        $data = [
            'header' => 'test MVC app',
        ];

        $this->view->render('Microframework', $data);
    }

    public function contactAction() {
        $data = [
            'header' => 'Страница контактов',
        ];

        $this->view->render('Контакты', $data);
    }

    public function aboutAction() {
        $data = [
            'header' => 'О проекте',
        ];

        $this->view->render('О проекте', $data);
    }

    public function examplesAction() {

        $employees = $this->model->getEmployees();
        $data = [
            'employees' => $employees,
        ];

        $this->view->render('Примеры работы с Моделью', $data);
    }

}
