<?php

class CourseSemesterController {

    public function __construct() {
        $this->view = new View();
    }
    
    public function insert() {
//        if (isset($_POST["initials"]) && isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["instrument"])) {
//            require 'model/CourseModel.php';
//            $model = new CourseModel();
//            $result = $model->insert($_POST["initials"], $_POST["name"], $_POST["description"], $_POST["instrument"]);
//            echo json_encode($result);
//        }else{
//            require 'model/SemesterModel.php';
//            $model = new SemesterModel();
//            $result = $model->selectAll();
//            $this->view->show("insertCourseSemesterView.php", $result);
//        }//else
            require 'model/SemesterModel.php';
            $model = new SemesterModel();
            $result = $model->selectAll();
            $this->view->show("insertCourseSemesterView.php", $result);
    }//insert  
    
    public function selectNotAll() {
            require 'model/CourseSemesterModel.php';
            $model = new CourseSemesterModel();
            $result = $model->selectNotAll($_POST['ID_Semester']);
            echo json_encode($result);
    }//insert  
}
