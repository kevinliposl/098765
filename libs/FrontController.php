<?php

class FrontController {

    static function main() {
        require 'libs/View.php';
        require 'libs/configuration.php';

        if (!empty($_GET['controller'])) {
            $controllerName = $_GET['controller'] . 'Controller';
        } else {
            $controllerName = 'IndexController';
        }
        if (!empty($_GET['action'])) {
            $actionName = $_GET['action'];
        } else {
            $actionName = 'defaultAction';
        }
        
        $controllerPath = $config->get('controllerFolder') . $controllerName . '.php';

        if (is_file($controllerPath)) {
            require $controllerPath;
        } else {
            die('Controlador no encontrado - 404 not found');
        }

        if (is_callable(array($controllerName, $actionName)) == FALSE) {
            return FALSE;
        }
        $controller = new $controllerName();
        $controller->$actionName();
    }

}
