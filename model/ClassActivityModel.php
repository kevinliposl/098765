<?php

class ClassActivityModel {

    private $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }
    
    public function insert($appointment, $student, $consecutive, $date,$assistance,$identification,$num_identifications,$observation) {
        $query = $this->db->prepare("call sp_insert_class_activity('$appointment', '$student', '$consecutive', '$date','$assistance','$identification','$num_identifications','$observation')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
    
    public function update($appointment, $student, $consecutive, $date,$assistance,$identificationNew,$num_identificationsNew,$identificationDelete,$num_identificationsDelete,$observation) {
        $query = $this->db->prepare("call sp_update_class_activity('$appointment', '$student', '$consecutive', '$date','$assistance','$identificationNew','$num_identificationsNew','$identificationDelete','$num_identificationsDelete','$observation')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
    
    public function selectAll() {
        $query = $this->db->prepare("call sp_select_all_course()");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }
    
    public function selectCourseClassActivity($identification) {
        $query = $this->db->prepare("call sp_select_course_class_activity('$identification')");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }
    
    public function selectStudentClassActivity($appointment) {
        $query = $this->db->prepare("call sp_select_student_class_activity('$appointment')");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }
    
    public function selectRecordContentClassActivity($appointment,$identification,$consecutive) {
        $query = $this->db->prepare("call sp_select_record_content_class_activity('$appointment','$identification','$consecutive')");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }
    
    public function selectRecordStudentClassActivity($appointment,$identification) {
        $query = $this->db->prepare("call sp_select_record_student_class_activity('$appointment','$identification')");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }
    
    public function selectConsecutiveClassActivity($appointment,$identification) {
        $query = $this->db->prepare("call sp_select_consecutive_class_activity('$appointment','$identification')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
    
    public function selectClassActivity($appointment,$identification,$consecutive) {
        $query = $this->db->prepare("call sp_select_class_activity('$appointment','$identification','$consecutive')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    public function delete($initials) {
        $query = $this->db->prepare("call sp_delete_course('$initials')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
    
    public function selectCoursesStudent($id) {
        $query = $this->db->prepare("call sp_select_student_courses('$id')");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }
    
        public function prueba($ID_semester,$initials) {
        $query = $this->db->prepare("call sp_prueba('$ID_semester','$initials')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
}
