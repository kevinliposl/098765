<?php

class AdminModel {

    protected $database;

    public function __construct() {
        $this->database = SPDO::singleton();
    }

}
