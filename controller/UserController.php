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
            if (isset($result[0]['permissions'])) {
                $flag = count($result[0]['permissions']);
                $this->permissions($flag);
            } else {
                echo json_encode(array('result', 'No tengo'));
            }
        } else {
            $this->view->show("loginView.php");
        }
    }

    private function permissions($flag) {
        if ($flag === 1) {
            echo json_encode(array('result', 'Tengo uno'));
        } else {
            echo json_encode(array('result', 'Tengo varios'));
        }
    }

    function signOff() {
        $session = SSession::getInstance();
        $session->destroy();
        $this->view->show("indexView.php");
    }

}
