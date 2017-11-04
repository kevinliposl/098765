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
                echo json_encode(array('result' => '0'));
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
            echo json_encode(array("result" => "1"));
        } else {
            echo json_encode($result);
        }
    }

    function signOff() {
        $session = SSession::getInstance();
        $session->destroy();
        $this->view->show("indexView.php");
    }

    function change() {
        if (isset($_POST['new'])) {
            $model = new UserModel();
            $result = $model->change('301110222', $_POST["new"]);
            echo json_encode($result);
        } else {
            $this->view->show("changePasswordView.php");
        }
    }

//change
}
