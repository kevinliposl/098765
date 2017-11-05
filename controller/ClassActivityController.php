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
            $result = $model->selectCourseClassActivity($session->identification);
            $this->view->show("selectClassActivityView.php", $result);
        }else{
            $this->view->show("indexView.php");
        }
    }//select
    
    public function record() {
        if (SSession::getInstance()->permissions == 'T'){
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            //$result = $model->selectCourseClassActivity('888');
            $result = $model->selectCourseClassActivity($session->identification);
            $this->view->show("selectRecordStudentForProfessorView.php", $result);
        }else{
            $this->view->show("indexView.php");
        }
    }//record
    
    public function selectStudentClassActivity(){
        if (SSession::getInstance()->permissions == 'T'){
             require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectStudentClassActivity($_POST['appointment']);
            echo json_encode($result);
        }else{
            $this->view->show("indexView.php");
        }
    }
    
    public function selectInformationStudentClassActivity(){
        if (SSession::getInstance()->permissions == 'T'){
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectInformationStudentClassActivity($_POST['identification']);
            echo json_encode($result);
        }else{
            $this->view->show("indexView.php");
        }
    }
    
    public function selectConsecutiveClassActivity(){
        if (SSession::getInstance()->permissions == 'T'){
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectConsecutiveClassActivity($_POST['appointment'],$_POST['identification']);
            echo json_encode($result);
        }else{
            $this->view->show("indexView.php");
        }
    }
    
    public function selectClassActivity(){
        if (SSession::getInstance()->permissions == 'T'){
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectClassActivity($_POST['appointment'],$_POST['identification'],$_POST['consecutive']);
            echo json_encode($result);
        }else{
            $this->view->show("indexView.php");
        }
    }
    
    public function selectRecordStudentClassActivity(){
        if (SSession::getInstance()->permissions == 'T'){
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectRecordStudentClassActivity($_POST['appointment'],$_POST['identification']);
            echo json_encode($result);
        }else{
            $this->view->show("indexView.php");
        }
    }
                    if (SSession::getInstance()->permissions == 'T'){
            
        }else{
            $this->view->show("indexView.php");
        }
    public function selectRecordContentClassActivity(){
        if (SSession::getInstance()->permissions == 'T'){
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectRecordContentClassActivity($_POST['appointment'],$_POST['identification'],$_POST['consecutive']);
            echo json_encode($result);
        }else{
            $this->view->show("indexView.php");
        }
    }

    public function insert() {
        if (isset($_POST["observation"]) && SSession::getInstance()->permissions == 'T') {
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->insert($_POST["appointment"], $_POST["student"], $_POST["consecutive"], $_POST["date"],$_POST['typeA'],$_POST['contents'],$_POST['count'],$_POST['observation']);
            echo json_encode($result);
        }else{
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectCourseClassActivity('888');
            $result = $model->selectCourseClassActivity('888');
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
