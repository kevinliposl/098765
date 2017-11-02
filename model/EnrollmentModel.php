<?php

class EnrollmentModel {
    private $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }
    
    public function deleteEnrollment($id){
        $query = $this->db->prepare("call sp_delete_enrollment('$id')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }//delete
    
    public function selectCoursesNotStudent($id) {
        $query = $this->db->prepare("call sp_select_course_not_student('$id')");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }
    
    public function insertEnrollment($student,$ids,$num_id) {
        $query = $this->db->prepare("call sp_insert_course_student('$student','$ids','$num_id')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
}//end of class
