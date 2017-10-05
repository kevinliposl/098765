<?php

class CourseModel {

    protected $database;

    public function __construct() {
        $this->database = SPDO::singleton();
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
