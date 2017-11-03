<?php

class ClassActivityController {

    public function __construct() {
        $this->view = new View();
    }

    public function select() {
        if (isset($_POST["initials"])) {
            require 'model/CourseModel.php';
            $model = new CourseModel();
            $result = $model->select($_POST["initials"]);
            echo json_encode($result);
        } else {
            require 'model/CourseModel.php';
            $model = new CourseModel();
            $result = $model->selectAll();
            $this->view->show("selectCourseView.php", $result);
        }//else
    }//select

    public function selectAll(){
            require 'model/CourseModel.php';
            $model = new CourseModel();
            $result = $model->selectAll();
        echo json_encode($result);
    }
    
    public function selectStudentClassActivity(){
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectStudentClassActivity($_POST['appointment']);
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
    
    public function prueba(){
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
                        $professors = "";
            $num_professors = 0;
            foreach ($_POST['datos'] as $valorActual) {
//                if ($professors == '') {
//                    $professors= $valorActual;
//                } else {
//                    $professors = $valorActual . "," . $professors;
//                }
                $professors = $valorActual . "," . $professors;
                $num_professors = $num_professors+ 1;
            }//for 
            $result = $model->prueba($num_professors,$professors);
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
