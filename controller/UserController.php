<?php

/**
 * @authors <kevin.sandoval@ucr.ac.cr><diego.cendenofonseca@ucr.ac.cr><elena.calderonfernandez@ucr.ac.cr><brogudbarrientos@gmail.com>
 * @version 1.0
 * @copyright (c) 2017, Funcion Academia Musical
 * @access public
 * @category controller
 * Class Usuario     
 */
class UserController {

    function __construct() {
        $this->view = new View();
        require 'model/UserModel.php';
    }

    /**
     * @return null
     * @param string $email Email de entidad
     * @param string $password Contrasenna de entidad
     * Funcion para logueo de usuario
     */
    function logIn() {
        $ssession = SSession::getInstance();
        if (!$ssession->__isset("identification")) {
            if (isset($_POST['email']) && $_POST['password']) {
                $model = new UserModel();
                $result = $model->logIn($_POST['email'], $_POST['password']);
                if (isset($result[0]['identification'])) {
                    $this->permissions($result);
                } else {
                    echo json_encode(array('result' => '0'));
                }
            } else {
                $this->view->show("loginView.php");
            }
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * @param array $result Permisos de entidad
     * Funcion para logueo de usuario
     */
    private function permissions($result = array()) {
        $session = SSession::getInstance();
        if (count($result) == 1) {
            $session->identification = $result[0]['identification'];
            $session->permissions = $result[0]['permissions'];
            echo json_encode(array("result" => "1"));
        } else {
            $session->identification = $result[0]['identification'];
            echo json_encode($result);
        }
    }

    /**
     * @return null
     * Funcion para logueo de usuario
     */
    function setPermissions() {
        if (isset($_POST['permissions'])) {
            $session = SSession::getInstance();
            $session->permissions = $_POST['permissions'];
            echo json_encode(array('result' => '1'));
        }
    }

    /**
     * @return null
     * Funcion para deslogueo de usuario
     */
    function signOff() {
        $ssession = SSession::getInstance();
        if ($ssession->__isset("identification")) {
            $session = SSession::getInstance();
            $session->destroy();
            $this->view->show("indexView.php");
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * Funcion para recordar contraseña de usuario
     */
    function rememberPassword() {
        $ssession = SSession::getInstance();
        if (!$ssession->__isset("identification")) {
            if (isset($_POST["email"])) {
                $model = new UserModel();
                $resultT = $model->rememberPassword($_POST["email"]);
                if (!isset($resultT[0]['result'])) {
                    require 'libs/EmailSystem.php';
                    $email = new EmailSystem();
                    $result = $email->contactSendPassword($_POST["email"], $resultT[0]['password']);
                } else {
                    $result = "0";
                }

                echo json_encode($result);
            } else {
                $this->view->show("rememberPasswordView.php");
            }
        } else {
            $this->view->show("indexView.php");
        }
    }

}
