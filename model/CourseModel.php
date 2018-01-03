<?php

class CourseModel {

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

    public function selectAllCourseDeleted($ID_Semester) {
        $query = $this->db->prepare("call sp_select_all_course_deleted($ID_Semester)");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }
    
    public function selectAllDelete() {
        $query = $this->db->prepare("call sp_select_all_course_delete()");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }
    
    public function select($initials) {
        $query = $this->db->prepare("call sp_select_course('$initials')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
    
    public function selectDelete($initials) {
        $query = $this->db->prepare("call sp_select_course_delete('$initials')");
        $query->execute();
        $result = $query->fetch();
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
    
    public function reactivate($initials) {
        $query = $this->db->prepare("call sp_reactivate_course('$initials')");
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
