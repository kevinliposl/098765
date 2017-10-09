<?php

class ReportModel {

    private $db;

    function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    function selectUserState() {
        $query = $this->db->prepare("call sp_report_user_state()");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }
}
