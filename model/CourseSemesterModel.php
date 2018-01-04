<?php

class CourseSemesterModel {

    private $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    function selectNotAllProfessorsCourseSemester($ID_semester, $initials) {
        $query = $this->db->prepare("call sp_select_not_professor_course_semester('$ID_semester','$initials')");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    function insertCourseSemester($ID_semester, $initials, $professors, $num_professors) {
        $query = $this->db->prepare("call sp_insert_assignment_course_semester_professor('$ID_semester','$initials','$professors','$num_professors')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    function selectNotAllProfessorsWithOutApp($ID_course_semester) {
        $query = $this->db->prepare("call sp_select_course_without_prof($ID_course_semester)");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    function reactivateAppointmentProfessor($id_course_semester,$identification) {
        $query = $this->db->prepare("call sp_reactivate_appointment_professor($id_course_semester,'$identification')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    function reactivateCourseSemester($ID_semester, $initials) {
        $query = $this->db->prepare("call sp_reactivate_assignment_course($ID_semester,'$initials')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    function selectAllCourseSemester($ID_semester) {
        $query = $this->db->prepare("call sp_select_all_course_semester('$ID_semester')");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    function selectAllDeleteCourseSemester($ID_semester) {
        $query = $this->db->prepare("call sp_select_all_delete_course_semester('$ID_semester')");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    function deleteCourseSemester($ID_semester, $initials) {
        $query = $this->db->prepare("call sp_delete_course_semester('$ID_semester','$initials')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    function selectAllProfessorsCourseSemester($ID_semester, $initials) {
        $query = $this->db->prepare("call sp_select_all_professor_course_semester('$ID_semester','$initials')");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    function deleteProfessorCourseSemester($ID_semester, $initials, $identification) {
        $query = $this->db->prepare("call sp_delete_professor_course_semester($ID_semester,'$initials','$identification')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

}
