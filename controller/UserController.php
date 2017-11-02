<?php

class UserController {

    function __construct() {
        $this->view = new View();
        require 'model/UserModel.php';
    }

    /////TEMPORAR MIENTRAS ARREGLAN BIEN LOS INSERTS
    function logIn() {
        if (isset($_POST['email']) && $_POST['password']) {
            $model = new UserModel();
            $result = $model->logIn($_POST['email'], $_POST['password']);
            if (isset($result[0]['permissions'])) {
                $flag = count($result[0]['permissions']);
                $this->permissions($flag);
                SSession::getInstance()->email = $_POST['email'];
            } else {
                echo json_encode(array('result', '0'));
            }
        } else {
            $this->view->show("loginView.php");
        }
    }

    private function permissions($flag) {
        if ($flag === 1) {
            echo json_encode(array('result', '1'));
        } else {
            echo json_encode(array('result', '2'));
        }
    }

    function signOff() {
        $session = SSession::getInstance();
        $session->destroy();
        $this->view->show("indexView.php");
    }

}
