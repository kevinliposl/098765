<?php

class CourseController {

    public function __construct() {
        $this->view = new View();
    }

    public function defaultAction() {
        $this->view->show("indexView.php",null);
    }
    
    public function defaultInsertCourse(){     
        $this->view->show("insertCourseView.php",null);
    }
    
    public function defaultDeleteCourse(){
        require 'model/CourseModel.php';
        $model = new CourseModel();
        $result = $model->selectAllCourses();
        $this->view->show("deleteCourseView.php",$result);
    }
    
    public function selectCourse(){
        require 'model/CourseModel.php';
        $model = new CourseModel();
        $id = $_POST["id"];
        $result = $model->selectCourse($id);
        echo json_encode($result);
    }
    
    public function defaultUpdateCourse(){
        require 'model/CourseModel.php';
        $model = new CourseModel();
        $result = $model->selectAllCourses();
        $this->view->show("updateCourseView.php",$result);
    }
    
    

    public function insertCourse() {
        require 'model/CourseModel.php';
        $model = new CourseModel();

        $initials = $_POST["initials"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $instrument = $_POST["instrument"];
       
        $result = $model->insertCourse($initials, $name, $description, $instrument);
        echo json_encode($result);
    }
    
    public function deleteCourse() {
        require 'model/CourseModel.php';
        $model = new CourseModel();

        $id = $_POST["id"];

        $result = $model->deleteCourse($id);
        echo json_encode($result);
    }
    
    public function updateCourse() {
        require 'model/CourseModel.php';
        $model = new CourseModel();

        $id = $_POST["id"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $instrument = $_POST["instrument"];

        $result = $model->updateCourse($id, $name, $description, $instrument);
        echo json_encode($result);
    }
}
