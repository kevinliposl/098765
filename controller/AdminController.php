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
        $firstLastName = $_POST["firstLastName"];
        $secondLastName = $_POST["secondLastName"];

        $result = $model->insertAdmin($id, $email, $name, $firstLastName, $secondLastName);
        echo json_encode($result);
    }

    public function selectAdmin() {
        require 'model/AdminModel.php';
        $model = new AdminModel();

        $id = $_POST["id"];
        $email = $_POST["email"];
        $name = $_POST["name"];
        $firstLastName = $_POST["firstLastName"];
        $secondLastName = $_POST["secondLastName"];

        $result = $model->insertAdmin($id, $email, $name, $firstLastName, $secondLastName);
        echo json_encode($result);
    }

}
