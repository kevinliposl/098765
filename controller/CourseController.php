<?php

class CourseController {

    public function __construct() {
        $this->view = new View();
    }

    public function select(){
        require 'model/CourseModel.php';
        $model = new CourseModel();
        $result = $model->select($_POST["initials"]);
        echo json_encode($result);
    }
    
    public function selectAll(){
            require 'model/CourseModel.php';
            $model = new CourseModel();
            $result = $model->selectAll();
        echo json_encode($result);
    }
    
    public function insert() {
        if (isset($_POST["initials"]) && isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["instrument"])) {
            require 'model/CourseModel.php';
            $model = new CourseModel();
            $result = $model->insert($_POST["initials"], $_POST["name"], $_POST["description"], $_POST["instrument"]);
            echo json_encode($result);
        }else{
            $this->view->show("insertCourseView.php",null);
        }//else
    }//insert
    
    public function delete() {
        if (isset($_POST["initials"])) {
            require 'model/CourseModel.php';
            $model = new CourseModel();
            $result = $model->delete($_POST["initials"]);
            echo json_encode($result);
        }else{
            require 'model/CourseModel.php';
            $model = new CourseModel();
            $result = $model->selectAll();
            $this->view->show("deleteCourseView.php", $result);
        }//else
    }//delete
    
    public function update() {
        if (isset($_POST["initials"]) && isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["instrument"])) {
            require 'model/CourseModel.php';
            $model = new CourseModel();
            $result = $model->update($_POST["initials"],$_POST["name"],$_POST["description"],$_POST["instrument"]);
            echo json_encode($result);
        }else{
            require 'model/CourseModel.php';
            $model = new CourseModel();
            $result = $model->selectAll();
            $this->view->show("updateCourseView.php", $result);
        }//else
    }//update
}
