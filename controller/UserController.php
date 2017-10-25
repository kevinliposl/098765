<?php

class UserController {

    function __construct() {
        require_once 'model/UserModel.php';
        $this->view = new View();
    }
    
    function defaultAction() {
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

    function insert() {
        require 'model/UserModel.php';
        $model = new UserModel();

        $email = $_POST["email"];
        $name = $_POST["name"];
        $lastname = $_POST["lastname"];
        $address = $_POST["address"];
        $password = $_POST["password"];

        $result = $model->insertUser($email, $name, $lastname, $address, $password);
        echo json_encode(array("result" => "1"));
    }

    function delete() {
        require 'model/UserModel.php';
        $model = new UserModel();

        $session = SSession::getInstance();
        $result = $model->deleteUser($session->email);

        if ($result == "true") {
            $session->destroy();
        }
        echo json_encode(array("result" => $result));
    }

    function update() {
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

    function logIn() {

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

    function signOff() {
        $session = SSession::getInstance();
        $session->destroy();
        $this->view->show("indexView.php");
    }

}
