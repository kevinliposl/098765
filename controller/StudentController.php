<?php

class StudentController {

    public function __construct() {
        $this->view = new View();
    }

    public function insertStudent() {
        if (isset($_POST["id"]) && isset($_POST["email"])) {
            require 'model/StudentModel.php';
            $model = new StudentModel();
            $result = $model->insertStudent($_POST["id"], $_POST['idType'], $_POST["email"],
                    $_POST["name"],$_POST["firstLastName"],$_POST["secondLastName"],$_POST["age"],
                    $_POST["address"],$_POST["gender"],$_POST["nationality"],$_POST["phoneOne"],$_POST["phoneTwo"],
                    $_POST["contactName"],$_POST["contactRelationship"],$_POST["contactPhone"],$_POST["contactEmail"]);
            echo json_encode($result);
        } else {
            $this->view->show("insertStudentView.php");
        }
    }

}