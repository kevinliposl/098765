<?php

class ClassActivityController {

    public function __construct() {
        $this->view = new View();
    }

    public function select() {
        if (SSession::getInstance()->permissions == 'T'){
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectCourseClassActivity('888');
            //$result = $model->selectCourseClassActivity($session->identification);
            $this->view->show("selectClassActivityView.php", $result);
        }else{
            $this->view->show("indexView.php");
        }
    }//select
    
    public function record() {
        if (SSession::getInstance()->permissions == 'T'){
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectCourseClassActivity('888');
            //$result = $model->selectCourseClassActivity($session->identification);
            $this->view->show("selectRecordStudentForProfessorView.php", $result);
        }else{
            $this->view->show("indexView.php");
        }
    }//record
    
    public function selectStudentClassActivity(){
        if (isset($_POST["appointment"]) && SSession::getInstance()->permissions == 'T'){
             require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectStudentClassActivity($_POST['appointment']);
            echo json_encode($result);
        }else{
            $this->view->show("indexView.php");
        }
    }
    
    public function selectInformationStudentClassActivity(){
        if (isset($_POST["identification"]) && SSession::getInstance()->permissions == 'T'){
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectInformationStudentClassActivity($_POST['identification']);
            echo json_encode($result);
        }else{
            $this->view->show("indexView.php");
        }
    }
    
    public function selectConsecutiveClassActivity(){
        if ( isset($_POST["appointment"]) && isset($_POST["identification"]) && SSession::getInstance()->permissions == 'T'){
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectConsecutiveClassActivity($_POST['appointment'],$_POST['identification']);
            echo json_encode($result);
        }else{
            $this->view->show("indexView.php");
        }
    }
    
    public function selectClassActivity(){
        if (isset($_POST["appointment"]) && isset($_POST["identification"]) && isset($_POST["consecutive"]) && SSession::getInstance()->permissions == 'T'){
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectClassActivity($_POST['appointment'],$_POST['identification'],$_POST['consecutive']);
            echo json_encode($result);
        }else{
            $this->view->show("indexView.php");
        }
    }
    
    public function selectRecordStudentClassActivity(){
        if (isset($_POST["appointment"]) && isset($_POST["identification"]) && SSession::getInstance()->permissions == 'T'){
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectRecordStudentClassActivity($_POST['appointment'],$_POST['identification']);
            echo json_encode($result);
        }else{
            $this->view->show("indexView.php");
        }
    }

    public function selectRecordContentClassActivity(){
        if (isset($_POST["appointment"]) && isset($_POST["identification"]) && isset($_POST["consecutive"]) && SSession::getInstance()->permissions == 'T'){
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectRecordContentClassActivity($_POST['appointment'],$_POST['identification'],$_POST['consecutive']);
            echo json_encode($result);
        }else{
            $this->view->show("indexView.php");
        }
    }

    public function insert() {
        if (isset($_POST["appointment"]) && isset($_POST["student"]) && isset($_POST["consecutive"]) && isset($_POST["date"]) && isset($_POST["typeA"]) && isset($_POST["contents"]) && isset($_POST["count"])  && isset($_POST["observation"]) && SSession::getInstance()->permissions == 'T') {
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->insert($_POST["appointment"], $_POST["student"], $_POST["consecutive"], $_POST["date"],$_POST['typeA'],$_POST['contents'],$_POST['count'],$_POST['observation']);
            echo json_encode($result);
        }else{
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectCourseClassActivity('888');
            //$result = $model->selectCourseClassActivity($session->identification);
            $this->view->show("insertClassActivityView.php",$result);
        }//else
    }//insert
    
    public function update() {
        if (isset($_POST["appointment"]) && isset($_POST["student"]) && isset($_POST["consecutive"]) && isset($_POST["date"]) && isset($_POST["typeA"]) && isset($_POST["contentsNew"]) && isset($_POST["countNew"]) && isset($_POST["contentsDelete"]) && isset($_POST["countDelete"]) && isset($_POST["observation"]) && SSession::getInstance()->permissions == 'T') {
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->update($_POST["appointment"], $_POST["student"], $_POST["consecutive"], $_POST["date"],$_POST['typeA'],$_POST['contentsNew'],$_POST['countNew'],$_POST['contentsDelete'],$_POST['countDelete'],$_POST['observation']);
            echo json_encode($result);
        }else{
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectCourseClassActivity('888');
            //$result = $model->selectCourseClassActivity($session->identification);
            $this->view->show("updateClassActivityView.php",$result);
        }//else
    }//update
}
