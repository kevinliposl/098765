<?php

class StudentModel {

    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public function insertStudent($id, $idType, $email, $name, $firstLastName, 
            $secondLastName, $age, $address, $gender, $nationality, $phoneOne, 
            $phoneTwo, $contactName, $contactRelationship, $contactPhone, 
            $contactEmail) {
        $result = array("result" => "1");
        return $result;
    }

}
