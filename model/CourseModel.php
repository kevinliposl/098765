<?php

class CourseModel {

    protected $database;

    public function __construct() {
        $this->database = SPDO::singleton();
    }

    public function insertCourse($initials, $name, $description, $instrument) {

        return NULL;
    }

    public function updateCourse($id, $name, $description, $instrument) {

        return NULL;
    }

    public function deleteCourse($id) {

        return NULL;
    }
}
