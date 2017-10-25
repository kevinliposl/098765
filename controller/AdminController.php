<?php

class AdminController {

    function __construct() {
        $this->view = new View();
        require 'model/AdminModel.php';
    }

    function insertAdmin() {
        if (isset($_POST["id"]) && isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["firstLastName"]) && isset($_POST["secondLastName"])) {
            $model = new AdminModel();
            $result = $model->insertAdmin($_POST["id"], $_POST["email"], $_POST["name"], $_POST["firstLastName"], $_POST["secondLastName"]);
            echo json_encode($result);
        } else {
            $this->view->show("insertAdminView.php");
        }
    }

    function selectAdmin() {
        if (isset($_POST["id"])) {
            $model = new AdminModel();
            $result = $model->selectAdmin($_POST["id"]);
            echo json_encode($result);
        } else {
            $this->view->show("deleteAdminView.php");
        }
    }

    function deleteAdmin() {
        if (isset($_POST["id"])) {
            $model = new AdminModel();
            $result = $model->deleteAdmin($_POST["id"]);
            echo json_encode($result);
        } else {
            $model = new AdminModel();
            $result = $model->selectAllAdmin();
            $this->view->show("deleteAdminView.php", $result);
        }
    }

}
