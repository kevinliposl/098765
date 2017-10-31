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
    
    public function selectNotAllCoursesSemester() {
            require 'model/CourseSemesterModel.php';
            $model = new CourseSemesterModel();
            $result = $model->selectNotAllCoursesSemester($_POST['ID_Semester']);
            echo json_encode($result);
    }//insert 
    
    public function selectNotAllProfessorsCourseSemester() {
            require 'model/CourseSemesterModel.php';
            $model = new CourseSemesterModel();
            $result = $model->selectNotAllProfessorsCourseSemester($_POST['ID_Semester'],$_POST['initials']);
            echo json_encode($result);
    }//insert  
    
    public function assignmentCourseSemester() {
            require 'model/CourseSemesterModel.php';
            $model = new CourseSemesterModel();          
            $professors = "";
            $num_professors = 0;
        if(isset($_POST['professors'])){    
            foreach ($_POST['professors'] as $valorActual) {
                if ($professors == '') {
                    $professors= $valorActual;
                } else {
                    $professors = $valorActual . "," . $professors;
                }
                $num_professors = $num_professors+ 1;
            }//for        
            $result = $model->assignmentCourseSemester($_POST['ID_Semester'],$_POST['initials'],$professors,$num_professors);
            echo json_encode($result);
        }else{
            $this->view->show("insertAdminView.php");
        }
    }//insert  
}
