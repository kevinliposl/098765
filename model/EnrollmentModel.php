<?php

class EnrollmentModel {
    private $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }
    
    public function deleteEnrollment($id){
        $query = $this->db->prepare("call sp_delete_enrollment('$id')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }//delete
}//end of class
