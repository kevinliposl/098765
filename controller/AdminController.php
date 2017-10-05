<?php

class AdminController {

    
    
    
    public function __construct() {
        $this->view = new View();
    }

    public function insertAdmin() {
        require 'model/AdminModel.php';
        $model = new AdminModel();

        $id = $_POST["id"];
        $email = $_POST["email"];
        $name = $_POST["name"];
        $lastname = $_POST["firstLastName"];
        $address = $_POST["secondLastName"];

        $result = $model->insertUser($email, $name, $lastname, $address, $password);
        echo json_encode(array("result" => $result));
    }

}
