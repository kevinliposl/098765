<?php

class SemesterController {

    function __construct() {
        $this->view = new View();
        require 'model/SemesterModel.php';
    }

    function insert() {
        if (isset($_POST["year"]) && isset($_POST["semester"])) {
            $model = new SemesterModel();
            $result = $model->insert($_POST["year"],$_POST["semester"]);
            echo json_encode($result);
        } else {
            $this->view->show("insertSemesterView.php");
        }
    }

    function delete() {
        if (isset($_POST["id"])) {
            $model = new SemesterModel();
            $result = $model->delete($_POST["id"]);
            echo json_encode($result);
        } else {
            $model = new SemesterModel();
            $result = $model->selectAll();
            $this->view->show("deleteAdminView.php", $result);
        }
    }

    function select() {
        $model = new SemesterModel();
        $result = $model->select($_POST["id"]);
        echo json_encode($result);
    }

}
