<?php

class ClassActivityController {

    public function __construct() {
        $this->view = new View();
    }

    public function select() {
//        if (isset($_POST["initials"])) {
//            require 'model/CourseModel.php';
//            $model = new CourseModel();
//            $result = $model->select($_POST["initials"]);
//            echo json_encode($result);
//        } else {
//            require 'model/CourseModel.php';
//            $model = new CourseModel();
//            $result = $model->selectAll();
//            $this->view->show("selectClassActivityView.php", $result);
//        }//else
        
                    require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $id="999";
            $result = $model->selectCourseClassActivity($id);
            $this->view->show("selectClassActivityView.php", $result);
    }//select
    
    public function record() {
//        if (isset($_POST["initials"])) {
//            require 'model/CourseModel.php';
//            $model = new CourseModel();
//            $result = $model->select($_POST["initials"]);
//            echo json_encode($result);
//        } else {
//            require 'model/CourseModel.php';
//            $model = new CourseModel();
//            $result = $model->selectAll();
//            $this->view->show("selectClassActivityView.php", $result);
//        }//else
        
                    require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $id="999";
            $result = $model->selectCourseClassActivity($id);
            $this->view->show("selectRecordStudentForProfessorView.php", $result);
    }//select
    
    public function selectStudentClassActivity(){
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectStudentClassActivity($_POST['appointment']);
        echo json_encode($result);
    }
    
    public function selectInformationStudentClassActivity(){
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectInformationStudentClassActivity($_POST['identification']);
        echo json_encode($result);
    }
    
    public function selectConsecutiveClassActivity(){
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectConsecutiveClassActivity($_POST['appointment'],$_POST['identification']);
        echo json_encode($result);
    }
    
    public function selectClassActivity(){
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectClassActivity($_POST['appointment'],$_POST['identification'],$_POST['consecutive']);
        echo json_encode($result);
    }
    
    public function selectRecordStudentClassActivity(){
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectRecordStudentClassActivity($_POST['appointment'],$_POST['identification']);
        echo json_encode($result);
    }
    
    public function selectRecordContentClassActivity(){
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectRecordContentClassActivity($_POST['appointment'],$_POST['identification'],$_POST['consecutive']);
        echo json_encode($result);
    }

    public function insert() {
        if (isset($_POST["observation"])) {
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->insert($_POST["appointment"], $_POST["student"], $_POST["consecutive"], $_POST["date"],$_POST['typeA'],$_POST['contents'],$_POST['count'],$_POST['observation']);
            echo json_encode($result);
        }else{
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $id="999";
            $result = $model->selectCourseClassActivity($id);
            $this->view->show("insertClassActivityView.php",$result);
        }//else
    }//insert
    
    public function update() {
        if (isset($_POST["observation"])) {
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->update($_POST["appointment"], $_POST["student"], $_POST["consecutive"], $_POST["date"],$_POST['typeA'],$_POST['contentsNew'],$_POST['countNew'],$_POST['contentsDelete'],$_POST['countDelete'],$_POST['observation']);
            echo json_encode($result);
        }else{
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $id="999";
            $result = $model->selectCourseClassActivity($id);
            $this->view->show("updateClassActivityView.php",$result);
        }//else
    }//update
}
