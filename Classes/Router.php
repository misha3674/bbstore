<?php

namespace Classes;

use Exception;

Class Router {
    private $path;

    private $args = array();

    function setPath($path) {

        $path .= DIRSEP;
        if (is_dir($path) == false) {

                throw new Exception ('Invalid controller path: `' . $path . '`');
        }

        $this->path = $path;

    }

    function delegate(){
        $this->getController($file, $controller, $action, $args);

        if (is_readable($file) == false) {

            die ('404 Not Found');

        }

        include ($file);

        // Создаём экземпляр контроллера
        $class = 'Controllers\Controller' .ucfirst($controller);

        $controller = new $class();

        if (is_callable(array($controller, $action)) == false) {

            die ('404 Not Found');
        }

        // Выполняем действие
        $controller->$action(); 
    }

    private function getController(&$file, &$controller, &$action, &$args) {

        $route = (empty($_GET['route'])) ? '' : $_GET['route'];

        if (empty($route)) { 
            $route = 'index'; 
        }

        // Получаем раздельные части
        $route = trim($route, '/\\');

        $parts = explode('/', $route);

        // Находим правильный контроллер
        $cmd_path = $this->path;

        foreach ($parts as $part) {

            $fullpath = $cmd_path . $part;

            // Есть ли папка с таким путём?
            if (is_dir($fullpath)) {

                $cmd_path .= $part . DIRSEP;
                array_shift($parts);
                continue;
            }

            // Находим файл
            if (is_file($fullpath . '.php')) {
                $controller = $part;
                array_shift($parts);
                break;
            }
        }

        if (empty($controller)) { $controller = 'index'; };

        // Получаем действие
        $action = array_shift($parts);

        if (empty($action)) { 
            $action = 'index'; 
        }

        $file = $cmd_path . $controller . '.php';

        $args = $parts;
    }
}

?>