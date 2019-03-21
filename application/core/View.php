<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace application\core;

/**
 * Description of View
 *
 * @author Юнус
 */
class View {

    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route) {

        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action']; // формирую путь
        //debug($this->path);
    }

    public function render($title, $vars = []) {

        extract($vars); //распаковываем массив переменных из контроллеров
        $template = 'application/views/' . $this->path . '.html';
        if (file_exists($template)) {
            ob_start(); // загружаю в буфер шаблон дефолт
            require 'application/views/' . $this->path . '.html';
            $content = ob_get_clean();
            require 'application/views/layouts/' . $this->layout . '.html';
        } else {
            echo "Шаблон контроллера не обнаружен!";
        }
    }

}
