<?php

class EnrollmentController {
    
    public function __construct() {
        $this->view = new View();
    }
    
    
    public function insert(){
        require 'model/StudentModel.php';
        $model = new StudentModel();

        $result = $model->selectAllStudent();
        $this->view->show("insertEnrollmentView.php", $result);
    }//insert
    
    public function delete(){
        require 'model/StudentModel.php';
        $model = new StudentModel();

        $result = $model->selectStudentEnrolled();
        $this->view->show("deleteEnrollmentView.php", $result);
    }//insert
    
    public function select(){
        require 'model/StudentModel.php';
        $model = new StudentModel();

        $result = $model->selectStudentEnrolled();
        $this->view->show("selectEnrollmentView.php", $result);
    }//select
    
    public function selectCourses(){
        require 'model/CourseModel.php';
        $model = new CourseModel();

        $result = $model->selectCoursesStudent($_POST["identification"]);
        echo json_encode($result);
    }//select
    
    public function deleteFunction(){
        require 'model/EnrollmentModel.php';
        $model = new EnrollmentModel();
        
        $result = $model->deleteEnrollment($_POST["ID"]);
        echo json_encode($result);
    }//deleteFunction
    
    public function selectCourseNotStudent(){
        require 'model/EnrollmentModel.php';
        $model = new EnrollmentModel();
        
        $result = $model->selectCoursesNotStudent($_POST["identification"]);
        echo json_encode($result);
    }//select
    
    public function insertFunction() {
        if(isset($_POST['professors']) && isset($_POST['identification'])){  
            require 'model/Enrollment.php';
            $model = new EnrollmentModel();          
            $professors = "";
            $num_professors = 0;
            foreach ($_POST['professors'] as $valorActual) {
                if ($professors == '') {
                    $professors= $valorActual;
                } else {
                    $professors = $valorActual . "," . $professors;
                }
                $num_professors = $num_professors+ 1;
            }//for        
            $result = $model->insertEnrollment($_POST['identification'],$professors,$num_professors);
            echo json_encode($result);
        }else{
            require 'model/SemesterModel.php';
            $model = new SemesterModel();
            $result = $model->selectAll();
            $this->view->show("insertCourseSemesterView.php", $result);
        }
    }//insert 
}//end of class

?>
