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
            $nombreAccion = $_GET['action'];
        } else {
            $nombreAccion = 'defaultAction';
        }
        $rutaControlador = $config->get('controllerFolder') . $controllerName . '.php';

        if (is_file($rutaControlador)) {
            require $rutaControlador;
        } else {
            die('Controlador no encontrado - 404 not found');
        }

        if (is_callable(array($controllerName, $nombreAccion)) == FALSE) {
            return FALSE;
        }
        $controller = new $controllerName();
        $controller->$nombreAccion();
    }
}
