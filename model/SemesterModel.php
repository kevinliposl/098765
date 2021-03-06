<?php

class SemesterModel {

    private $db;

    function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    function insert($year, $semester) {
        $query = $this->db->prepare("call sp_insert_semester($year,$semester)");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    function select($id) {
        $query = $this->db->prepare("call sp_select_semester($id)");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    function delete($id) {
        $query = $this->db->prepare("call sp_delete_semester($id)");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    function selectAll() {
        $query = $this->db->prepare("call sp_select_all_semester()");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    function selectAllSemesterWithDeletedAssignments() {
        $query = $this->db->prepare("call sp_select_semester_with_deleted_assignments()");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    function selectCourseWithoutApp() {
        $query = $this->db->prepare("call sp_select_course_without_app()");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    function selectAllSemesterWithAssignments() {
        $query = $this->db->prepare("call sp_select_all_semester_with_assignments()");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    function selectAllSemesterWithAssignmentsAndSchedule() {
        $query = $this->db->prepare("call sp_select_all_semester_with_assignments_and_schedule()");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

}
