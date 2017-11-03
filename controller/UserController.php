<?php

class UserController {

    function __construct() {
        $this->view = new View();
        require 'model/UserModel.php';
    }

    function logIn() {
        if (isset($_POST['email']) && $_POST['password']) {
            $model = new UserModel();
            $result = $model->logIn($_POST['email'], $_POST['password']);
            if (isset($result[0]['identification'])) {
                $this->permissions($result);
            } else {
                echo json_encode(array('result', '0'));
            }
        } else {
            $this->view->show("loginView.php");
        }
    }

    private function permissions($result = array()) {
        $session = SSession::getInstance();
        if (count($result) == 1) {
            $session->identification = $result[0]['identification'];
            $session->permissions = $result[0]['permissions'];
            echo json_encode(array('result', '1'));
        } else {
            $session->user = $result;
            echo json_encode(array('result', '2'));
        }
    }

    function signOff() {
        $session = SSession::getInstance();
        $session->destroy();
        $this->view->show("indexView.php");
    }

}
