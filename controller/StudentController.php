<?php

class StudentController {

    public function __construct() {
        $this->view = new View();
    }

    public function insertStudent() {
        if (isset($_POST["id"]) && isset($_POST["email"])) {
            require 'model/StudentModel.php';
            $model = new StudentModel();
            $result = $model->insertStudent($_POST["id"], $_POST['idType'], $_POST["email"], $_POST["name"], $_POST["firstLastName"], $_POST["secondLastName"], $_POST["age"], $_POST["address"], $_POST["gender"], $_POST["nationality"], $_POST["phoneOne"], $_POST["phoneTwo"], $_POST["contactName"], $_POST["contactRelationship"], $_POST["contactPhone"], $_POST["contactEmail"]);
            echo json_encode($result);
        } else {
            $this->view->show("insertStudentView.php");
        }
    }

    public function deleteStudent() {
        require 'model/StudentModel.php';
        if (!isset($_POST["id"]) && !isset($_POST["email"])) {
            $model = new StudentModel();
            $result = $model->selectAllStudent();
            $this->view->show("deleteStudentView.php", $result);
        } else {
            $model = new StudentModel();
            $result = $model->deleteStudent($_POST['id']);
            echo json_encode($result);
        }
    }
    
    public function reactivateStudent() {
        require 'model/StudentModel.php';
        if (!isset($_POST["id"]) && !isset($_POST["email"])) {
            $model = new StudentModel();
            $result = $model->selectAllDeleteStudent();
            $this->view->show("reactivateStudentView.php", $result);
        } else {
            $model = new StudentModel();
            $result = $model->reactivateStudent($_POST['id'], $_POST['tipo']);
            echo json_encode($result);
        }
    }

    public function updateStudent() {
        require 'model/StudentModel.php';
        if (!isset($_POST["id"]) && !isset($_POST["email"])) {
            $model = new StudentModel();
            $result = $model->selectAllStudent();
            $this->view->show("updateStudentView.php", $result);
        } else {
            $model = new StudentModel();
            $result = $model->updateStudent($_POST["id"],$_POST["oldId"], $_POST['idType'], $_POST["email"], $_POST["name"], $_POST["firstLastName"], $_POST["secondLastName"], $_POST["age"], " ", $_POST["gender"], $_POST["nationality"], $_POST["phoneOne"], $_POST["phoneTwo"], $_POST["contactName"], $_POST["contactRelationship"], $_POST["contactPhone"], $_POST["contactEmail"]);
            echo json_encode($result);
        }
    }
    public function getStudentData() {
        require 'model/StudentModel.php';
        if (!isset($_POST["id"]) && !isset($_POST["email"])) {
            $model = new StudentModel();
            $result = $model->selectAllStudent();
            $this->view->show("getStudentDataView.php", $result);
        }
    }

    public function selectStudent() {
        require 'model/StudentModel.php';
        $model = new StudentModel();

        $id = $_POST["id"];

        $result = $model->selectStudent($id);
        echo json_encode($result);
    }
    
    public function selectDeleteStudent() {
        require 'model/StudentModel.php';
        $model = new StudentModel();

        $result = $model->selectDeleteStudent($_POST["id"], $_POST["tipo"]);
        echo json_encode($result);
    }

}
