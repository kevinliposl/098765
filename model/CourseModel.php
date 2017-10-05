<?php

class CourseModel {

    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }
    
    public function insertCourse($initials, $name, $description, $instrument) {
        $query = $this->db->prepare("call sp_insert_course('$initials','$name','$description','$instrument')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    public function updateCourse($id, $name, $description, $instrument) {

        return NULL;
    }

    public function deleteCourse($id) {

        return NULL;
    }
}
