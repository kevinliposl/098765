<?php

class CourseModel {

    protected $database;

    public function __construct() {
        $this->database = SPDO::singleton();
    }

}
