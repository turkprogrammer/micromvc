<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccountController
 *
 * @author Юнус
 */

namespace application\controllers;
use application\core\Controller;

class AccountController  extends Controller{

    //put your code here
    public function loginAction() {
      //$this->view->redirect('/');
      $this->view->render('Страница входа');
    }

    public function registerAction() {
        //echo 'Страница регистрации ';
         $this->view->render('Страница регистрации');
        //var_dump($this->route);
    }

}
