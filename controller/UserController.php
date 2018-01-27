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
            if (isset($_POST['email']) && $_POST['pass']) {
                $model = new UserModel();

                $keyPrivate = SSession::getInstance()->keys['privatekey'];
                $email = RSA::getInstance()->decrypt($keyPrivate, $_POST["email"]);
                $pass = RSA::getInstance()->decrypt($keyPrivate, $_POST["pass"]);
                $result = $model->logIn($email, $pass);

                if (isset($result[0]['identification'])) {
                    $this->permissions($result);
                } else {
                    echo json_encode(array('result' => '0'));
                }
            } else {
                SSession::getInstance()->keys = RSA::getInstance()->keygen();
                $keyPublicHex = RSA::getInstance()->publicKeyToHex(SSession::getInstance()->keys['privatekey']);
                $this->view->show("loginView.php", array('result' => $keyPublicHex));
            }
        } else {
            SSession::getInstance()->destroy();
            SSession::getInstance()->keys = RSA::getInstance()->keygen();
            $keyPublicHex = RSA::getInstance()->publicKeyToHex(SSession::getInstance()->keys['privatekey']);
            $this->view->show("loginView.php", array('result' => $keyPublicHex));
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
        if (!SSession::getInstance()->__isset("permissions")) {
            if (isset($_POST["email"])) {
                $model = new UserModel();
                $result = $model->rememberPassword($_POST["email"]);
                if ($result['result'] === '1') {
                    $mail = SMail::getInstance();
                    if ($mail->sendMail($_POST["email"], 'Olvidó su contraseña de ingreso al sitio', 'Hola, gracias por formar parte de la academia. '
                                    . 'Su contraseña de ingreso al sitio es... <br><h1>' . $result['password'] . '</h1>')) {
                        echo json_encode(array("result" => '1'));
                    } else {
                        echo json_encode(array("result" => '0'));
                    }
                } else {
                    echo json_encode(array("result" => '0'));
                }
            } else {
                $this->view->show("rememberPasswordView.php");
            }
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * @param integer $id Identificador de entidad
     * Funcion para cambiar la contraseñas
     */
    function changePassword() {
        if (SSession::getInstance()->permissions == 'R' || SSession::getInstance()->permissions == 'A' || SSession::getInstance()->permissions == 'T' || SSession::getInstance()->permissions == 'S') {
            if (isset($_POST['newPass'])) {
                $model = new UserModel();
                $result = $model->changePassword(SSession::getInstance()->identification, $_POST['newPass']);
                echo json_encode($result);
                if ($result["result"] === '1' && !SSession::getInstance()->permissions == 'R') {
                    $mail = SMail::getInstance();
                    $mail->sendMail($result["email"], 'Contraseña de ingreso al sitio', 'Hola, su contraseña a sido cambiada. Su nueva contraseña'
                            . ' de ingreso al sitio es... <br><h1>' . $result["password"] . '</h1>');
                }
            } else {
                $this->view->show("changePasswordView.php");
            }
        } else {
            $this->view->show("404View.php");
        }
    }

}
