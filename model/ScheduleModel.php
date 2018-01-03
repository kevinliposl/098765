<?php

class ScheduleModel {

    private $db;

    function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    function insert($ID, $start, $end, $day) {
        $query = $this->db->prepare("call sp_insert_schedule($ID, $start, $end, '$day')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    function select($id) {
        $query = $this->db->prepare("call sp_select_schedule($id)");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    function delete($ID, $ID_schedule) {
        $query = $this->db->prepare("call sp_delete_schedule($ID,$ID_schedule)");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    function selectAll($id) {
        $query = $this->db->prepare("call sp_select_schedule($id)");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    function selectWithoutSchedule($ID_semester) {
        $query = $this->db->prepare("call sp_select_appointment_schedule($ID_semester)");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    function selectWithSchedule($ID_semester) {
        $query = $this->db->prepare("call sp_select_appointment_with_schedule($ID_semester)");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    function selectCourseSchedules($ID_appointment) {
        $query = $this->db->prepare("call sp_select_course_schedules($ID_appointment)");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

}
