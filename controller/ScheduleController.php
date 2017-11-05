<?php

class ScheduleController {

    function __construct() {
        $this->view = new View();
        require 'model/SemesterModel.php';
    }

    function insert() {
        $model = new SemesterModel();
        if (isset($_POST["ID"]) && isset($_POST["inicio"]) && isset($_POST["fin"]) && isset($_POST["day"])) {
            $result = $model->insert($_POST["year"], $_POST["semester"]);
            echo json_encode($result);
        } else {
            $result = $model->selectAll();
            $this->view->show("insertScheduleView.php", $result);
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
            $this->view->show("deleteSemesterView.php", $result);
        }
    }

    function select() {
        $model = new SemesterModel();
        if (isset($_POST["id"])) {
            $result = $model->select($_POST["id"]);
            echo json_encode($result);
        } else {
            $result = $model->selectAll();
            $this->view->show("selectSemesterView.php", $result);
        }
    }

    function selectWithoutSchedule() {
        if (isset($_POST["ID_Semester"])) {
            require 'model/CourseSemesterModel.php';
            $model = new CourseSemesterModel();
            $result = $model->selectWithoutSchedule($_POST["ID_Semester"]);
            echo json_encode($result);
        }
    }
}
