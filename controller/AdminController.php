<?php

/**
 * @author Kev Sand <kevin.sandoval@ucr.ac.cr>
 * @version 1.0
 * @copyright (c) 2017, Funcion Academia Musical
 * @access public
 * @category controller
 * Class Admin     
 */
class AdminController {

    function __construct() {
        $this->view = new View();
        require 'model/AdminModel.php';
    }

    /**
     * @author Kev Sand <kevin.sandoval@ucr.ac.cr>
     * @return null
     * @param integer $id Identificador de entidad
     * @param string $email Email de entidad
     * @param string $name Nombre de entidad
     * @param string $firstLastName Apellido de entidad
     * Funcion para insertar administrador
     */
    function insert() {
        if (SSession::getInstance()->permissions == 'R') {
            if (isset($_POST["id"]) && isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["firstLastName"]) && isset($_POST["secondLastName"])) {
                $model = new AdminModel();
                $result = $model->insert($_POST["id"], $_POST["email"], $_POST["name"], $_POST["firstLastName"], $_POST["secondLastName"]);
                echo json_encode($result);
            } else {
                $this->view->show("insertAdminView.php");
            }
        } else {
            $this->view->show("404View.php");
        }
    }

    /**
     * @author Kev Sand <kevin.sandoval@ucr.ac.cr>
     * @return null
     * @param integer $id Identificador de entidad
     * Funcion para eliminar administrador
     */
    function delete() {
        if (SSession::getInstance()->permissions == 'R') {
            $model = new AdminModel();
            if (isset($_POST["id"])) {
                $result = $model->delete($_POST["id"]);
                echo json_encode($result);
            } else {
                $result = $model->selectAll();
                $this->view->show("deleteAdminView.php", $result);
            }
        } else {
            $this->view->show("404View.php");
        }
    }

    /**
     * @author Kev Sand <kevin.sandoval@ucr.ac.cr>
     * @return null
     * @param integer $id Identificador de entidad
     * Funcion para seleccionar administrador
     */
    function select() {
        if (SSession::getInstance()->permissions == 'R') {
            $model = new AdminModel();
            if (isset($_POST["id"])) {
                $result = $model->select($_POST["id"]);
                echo json_encode($result);
            } else {
                $result = $model->selectAll();
                $this->view->show("selectAdminView.php", $result);
            }
        } else {
            $this->view->show("404View.php");
        }
    }

}
