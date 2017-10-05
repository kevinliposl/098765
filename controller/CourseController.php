<?php

class CourseController {

    public function __construct() {
        $this->view = new View();
    }

//    public function defaultAction() {
//        require 'model/UserModel.php';
//        $session = SSession::getInstance();
//        $model = new UserModel();
//        $result = $model->selectUser($session->email);
//        $vars = array(
//            "email" => $result->Email,
//            "name" => $result->Name,
//            "lastname" => $result->LastName,
//            "password" => $result->Password,
//            "address" => $result->Address);
//        //$this->view->show("userView.php", $vars);
//        $this->view->show("insertCourseView.php",null);
//    }
    
    public function defaultInsertCourseView(){
        $this->view->show("insertCourseView.php",null);
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
        echo json_encode(array("result" => $result));
    }
    
    public function updateCourse() {
        require 'model/CourseModel.php';
        $model = new CourseModel();

        $id = $_POST["id"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $instrument = $_POST["instrument"];

        $result = $model->updateCourse($id, $name, $description, $instrument);
        echo json_encode(array("result" => $result));
    }
}
