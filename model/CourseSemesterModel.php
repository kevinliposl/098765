<?php

class CourseSemesterModel {

    private $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }
    
    public function selectNotAll($ID_semester) {
        $query = $this->db->prepare("call sp_select_not_course_semester('$ID_semester')");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }
}
