<?php

class ScheduleController {

    function __construct() {
        $this->view = new View();
        require 'model/ScheduleModel.php';
    }

    function insert() {
        $model = new ScheduleModel();
        if (isset($_POST["ID"]) && isset($_POST["start"]) && isset($_POST["end"]) && isset($_POST["day"])) {
            $result = $model->insert($_POST["ID"],$_POST["start"],$_POST["end"],$_POST["day"]);
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
        $model = new ScheduleModel();
        if (isset($_POST["ID_Semester"])) {
            $result = $model->select($_POST["ID_Semester"]);
            echo json_encode($result);
        } else {
            $result = $model->selectAll();
            $this->view->show("selectScheduleView.php", $result);
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
