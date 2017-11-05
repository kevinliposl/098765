<?php

class SemesterController {

    function __construct() {
        $this->view = new View();
        require 'model/SemesterModel.php';
    }

    function insert() {
        if (SSession::getInstance()->permissions == 'A') {
            if (isset($_POST["year"]) && isset($_POST["semester"])) {
                $model = new SemesterModel();
                $result = $model->insert($_POST["year"], $_POST["semester"]);
                echo json_encode($result);
            } else {
                $this->view->show("insertSemesterView.php");
            }
        } else {
            $this->view->show("404View.php");
        }
    }

    function delete() {
        if (SSession::getInstance()->permissions == 'A') {
            if (isset($_POST["id"])) {
                $model = new SemesterModel();
                $result = $model->delete($_POST["id"]);
                echo json_encode($result);
            } else {
                $model = new SemesterModel();
                $result = $model->selectAll();
                $this->view->show("deleteSemesterView.php", $result);
            }
        } else {
            $this->view->show("404View.php");
        }
    }

    function select() {
        if (SSession::getInstance()->permissions == 'A') {
            $model = new SemesterModel();
            if (isset($_POST["id"])) {
                $result = $model->select($_POST["id"]);
                echo json_encode($result);
            } else {
                $result = $model->selectAll();
                $this->view->show("selectSemesterView.php", $result);
            }
        } else {
            $this->view->show("404View.php");
        }
    }

}
