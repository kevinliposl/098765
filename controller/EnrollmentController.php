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
}//end of class

?>
