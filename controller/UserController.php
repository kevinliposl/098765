<?php

class UserController {

    public function __construct() {
        $this->view = new View();
    }

    public function defaultAction() {
        require 'model/UserModel.php';
        $session = SSession::getInstance();
        $model = new UserModel();
        $result = $model->selectUser($session->email);
        $vars = array(
            "email" => $result->Email,
            "name" => $result->Name,
            "lastname" => $result->LastName,
            "password" => $result->Password,
            "address" => $result->Address);
        $this->view->show("userView.php", $vars);
    }

    public function loginUser() {
        $this->view->show("loginView.php");
    }

    public function insertUser() {
        require 'model/UserModel.php';
        $model = new UserModel();

        $email = $_POST["email"];
        $name = $_POST["name"];
        $lastname = $_POST["lastname"];
        $address = $_POST["address"];
        $password = $_POST["password"];

        $result = $model->insertUser($email, $name, $lastname, $address, $password);
        echo json_encode(array("result" => $result));
    }

    public function deleteUser() {
        require 'model/UserModel.php';
        $model = new UserModel();

        $session = SSession::getInstance();
        $result = $model->deleteUser($session->email);

        if ($result == "true") {
            $session->destroy();
        }
        echo json_encode(array("result" => $result));
    }

    public function updateUser() {
        require 'model/UserModel.php';
        $model = new UserModel();

        $email = $_POST["email"];
        $name = $_POST["name"];
        $lastname = $_POST["lastname"];
        $address = $_POST["address"];
        $password = $_POST["password"];
        
        $result = $model->updateUser($email, $name, $lastname, $address, $password);
        
        echo json_encode(array("result" => $result));
    }

    public function logIn() {
        require 'model/UserModel.php';
        $model = new UserModel();

        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = $model->logIn($email, $password);

        if ($result == "true") {
            $session = SSession::getInstance();
            $session->email = $_POST['email'];
        }
        echo json_encode(array("result" => $result));
    }

    public function signOff() {
        $session = SSession::getInstance();
        $session->destroy();
        $this->view->show("indexView.php");
    }

}
