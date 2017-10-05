<?php

class StudentController {

    public function __construct() {
        $this->view = new View();
    }

    public function insertStudent() {
        if (isset($_POST["id"]) && isset($_POST["email"])) {
            $result = "1";
            echo json_encode($result);
        } else {
            $this->view->show("insertStudentView.php");
        }
    }

}
