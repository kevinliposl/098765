<?php

class UserController {

    function __construct() {
        $this->view = new View();
        require 'model/UserModel.php';
    }

    function logIn() {
        if (isset($_POST['email']) && $_POST['password']) {
            $model = new UserModel();
            $session = SSession::getInstance();
            $result = $model->logIn($_POST['email'], $_POST['password']);

            if (isset($result[0]['identification'])) {
                if (count($result) == 1) {
                    $session->identification = $result[0]['identification'];
                    echo json_encode(array('result', '1'));
                } else {
                    $session->user = $result;
                    echo json_encode(array('result', '2'));
                }
            } else {
                echo json_encode(array('result', '0'));
            }
        } else {
            $this->view->show("loginView.php");
        }
    }

    function signOff() {
        $session = SSession::getInstance();
        $session->destroy();
        $this->view->show("indexView.php");
    }

}
