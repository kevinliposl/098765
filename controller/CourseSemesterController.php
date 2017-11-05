<?php

class CourseSemesterController {

    public function __construct() {
        $this->view = new View();
    }
    
    public function insert() {
        if(isset($_POST['professors']) && isset($_POST['ID_Semester']) && isset($_POST['initials']) && SSession::getInstance()->permissions == 'A'){  
            require 'model/CourseSemesterModel.php';
            $model = new CourseSemesterModel();          
            $professors = "";
            $num_professors = 0;
            foreach ($_POST['professors'] as $valorActual) {
                if ($professors == '' || $professors == '-1') {
                    $professors= $valorActual;
                } else {
                    $professors = $valorActual . "," . $professors;
                }
                $num_professors = $num_professors+ 1;
            }//for        
            $result = $model->insertCourseSemester($_POST['ID_Semester'],$_POST['initials'],$professors,$num_professors);
            echo json_encode($result);
        }else{
            require 'model/SemesterModel.php';
            $model = new SemesterModel();
            $result = $model->selectAll();
            $this->view->show("insertCourseSemesterView.php", $result);
        }
    }//insert  
    
    public function select() {
        if(SSession::getInstance()->permissions == 'A'){
            require 'model/SemesterModel.php';
            $model = new SemesterModel();
            $result = $model->selectAll();
            $this->view->show("selectCourseSemesterView.php", $result);
        }else{
            $this->view->show("indexView.php");
        }
    }//insert  
    
    public function selectAllCoursesSemester() {
        if(isset($_POST['ID_Semester']) && SSession::getInstance()->permissions == 'A'){
            require 'model/CourseSemesterModel.php';
            $model = new CourseSemesterModel();
            $result = $model->selectAllCourseSemester($_POST['ID_Semester']);
            echo json_encode($result);
        }else{
            $this->view->show("indexView.php");
        }
    }//insert 

    public function selectNotAllProfessorsCourseSemester() {
        if(isset($_POST['ID_Semester']) && isset($_POST['initials']) && SSession::getInstance()->permissions == 'A'){
            require 'model/CourseSemesterModel.php';
            $model = new CourseSemesterModel();
            $result = $model->selectNotAllProfessorsCourseSemester($_POST['ID_Semester'],$_POST['initials']);
            echo json_encode($result);
        }else{
            $this->view->show("indexView.php");
        }
    }//insert  
    
    public function selectAllProfessorsCourseSemester() {
        if(isset($_POST['ID_Semester']) && isset($_POST['initials']) && SSession::getInstance()->permissions == 'A'){
            require 'model/CourseSemesterModel.php';
            $model = new CourseSemesterModel();
            $result = $model->selectAllProfessorsCourseSemester($_POST['ID_Semester'],$_POST['initials']);
            echo json_encode($result);
        }else{
            $this->view->show("indexView.php");
        }
    }//insert  
    
    public function deleteCourse() {
        if (isset($_POST["ID_Semester"]) && isset($_POST["initials"]) && SSession::getInstance()->permissions == 'A') {
            require 'model/CourseSemesterModel.php';
            $model = new CourseSemesterModel();
            $result = $model->deleteCourseSemester($_POST['ID_Semester'],$_POST['initials']);
            echo json_encode($result);
        }else{
            require 'model/SemesterModel.php';
            $model = new SemesterModel();
            $result = $model->selectAll();
            $this->view->show("deleteCourseSemesterView.php", $result);
        }//else
    }//delete
    
    public function deleteProfessor() {
        if (isset($_POST["ID_Semester"]) && isset($_POST["initials"]) && isset($_POST["identification"]) && SSession::getInstance()->permissions == 'A') {
            require 'model/CourseSemesterModel.php';
            $model = new CourseSemesterModel();
            $result = $model->deleteProfessorCourseSemester($_POST['ID_Semester'],$_POST['initials'],$_POST['identification']);
            echo json_encode($result);
        }else{
            require 'model/SemesterModel.php';
            $model = new SemesterModel();
            $result = $model->selectAll();
            $this->view->show("deleteProfessorCourseSemesterView.php", $result);
        }//else
    }//delete
}
