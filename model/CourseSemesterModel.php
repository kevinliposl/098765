<?php

class CourseSemesterModel {

    private $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }
    
    public function selectNotAllProfessorsCourseSemester($ID_semester,$initials) {
        $query = $this->db->prepare("call sp_select_not_professor_course_semester('$ID_semester','$initials')");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }
    
     public function insertCourseSemester($ID_semester,$initials,$professors,$num_professors) {
        $query = $this->db->prepare("call sp_insert_assignment_course_semester_professor('$ID_semester','$initials','$professors','$num_professors')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
    
    public function selectAllCourseSemester($ID_semester) {
        $query = $this->db->prepare("call sp_select_all_course_semester('$ID_semester')");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }
    
    public function deleteCourseSemester($ID_semester,$initials) {
        $query = $this->db->prepare("call sp_delete_course_semester('$ID_semester','$initials')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
    
    public function selectAllProfessorsCourseSemester($ID_semester,$initials) {
        $query = $this->db->prepare("call sp_select_all_professor_course_semester('$ID_semester','$initials')");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }
    
    public function deleteProfessorCourseSemester($ID_semester,$initials,$identification) {
        $query = $this->db->prepare("call sp_delete_professor_course_semester('$ID_semester','$initials','$identification')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
}
