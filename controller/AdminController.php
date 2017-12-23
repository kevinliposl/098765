<?php

/**
 * @authors <kevin.sandoval@ucr.ac.cr><diego.cendenofonseca@ucr.ac.cr><elena.calderonfernandez@ucr.ac.cr><brogudbarrientos@gmail.com>
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
     * @return null
     * @param integer $id Identificador de entidad
     * @param string $email Email de entidad
     * @param string $name Nombre de entidad
     * @param string $firstLastName Apellido de entidad
     * @param string $secondLastName Apellido de entidad
     * Funcion para insertar administrador
     */
    function insert() {
        if (SSession::getInstance()->permissions == 'R') {
            if (isset($_POST["id"]) && isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["firstLastName"]) && isset($_POST["secondLastName"])) {
                $model = new AdminModel();
                $result = $model->insert($_POST["id"], $_POST["email"], $_POST["name"], $_POST["firstLastName"], $_POST["secondLastName"]);
                if ($result['result'] === '1') {
                    $mail = SMail::getInstance();
                    if ($mail->sendMail($_POST["email"], 'Contraseña de ingreso al sitio', 'Hola, gracias por formar parte de la academia, la contraseña'
                                    . ' de ingreso al sitio es... <br><h1>' . $result['password'] . '</h1>')) {
                        echo json_encode(array("result" => '1'));
                    } else {
                        echo json_encode(array("result" => '0'));
                    }
                } else {
                    echo json_encode(array("result" => '0'));
                }
            } else {
                $this->view->show("insertAdminView.php");
            }
        } else {
            $this->view->show("404View.php");
        }
    }

    /**
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

    /**
     * @return null
     * @param integer $id Identificador de entidad
     * Funcion para actualizar administrador
     */
    function updatePersonalData() {
        $ssession = SSession::getInstance();
        if ($ssession->permissions == 'A') {
            $model = new AdminModel();
            if (isset($_POST['id']) && isset($_POST['email']) && isset($_POST['name']) && isset($_POST['firstLastName']) && isset($_POST['secondLastName'])) {
                $result = $model->updatePersonalData(SSession::getInstance()->identification, $_POST['id'], $_POST['email'], $_POST['name'], $_POST['firstLastName'], $_POST['secondLastName']);
                echo json_encode($result);
            } else {
                $result = $model->select($ssession->identification);
                $this->view->show("updatePersonalDataAdminView.php", $result);
            }
        } else {
            $this->view->show("404View.php");
        }
    }

}
