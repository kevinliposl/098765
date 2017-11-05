<?php

class ScheduleModel {

    private $db;

    function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    function insert($ID, $start, $end, $day) {
        $query = $this->db->prepare("call sp_insert_schedule($ID,'$start','$end','$day')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    function select($id) {
        $query = $this->db->prepare("call sp_select_schedule($id)");
        $query->execute();
        $result = $query->fetchAll();
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

}
