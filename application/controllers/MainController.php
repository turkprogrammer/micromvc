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
        echo "Index";
    }
    public function contactAction(){
        echo 'Контакты';
    }
}
