<?php

class ClassActivityModel {

    private $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }
    
    public function insert($initials, $name, $description, $instrument) {
        $query = $this->db->prepare("call sp_insert_course('$initials','$name','$description','$instrument')");
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
        $query = $this->db->prepare("call sp_select_course_class_activit('$identification')");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    public function update($initials, $name, $description, $instrument) {
         $query = $this->db->prepare("call sp_update_course('$initials','$name','$description','$instrument')");
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
}
