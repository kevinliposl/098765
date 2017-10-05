<?php

class AdminModel {

    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public function insertAdmin($id, $email, $name, $first_lastname, $second_lastname) {
        $query = $this->db->prepare("call sp_insert_admin('$id','$email','$name','$first_lastname','$second_lastname')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    public function selectAdmin($id) {
        $query = $this->db->prepare("call sp_select_admin('$id')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    public function selectAllAdmin() {
        $query = $this->db->prepare("call sp_select_all_admin()");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }
    
    public function insertProfessor($typeId, $id, $nationality, $name, $first_lastname, $second_lastname, $province, $canton, $address,
            $gender, $phone, $phone2, $email, $additionalInformation) {
        $query = $this->db->prepare("call sp_insert_teacher('$id','$name','$first_lastname','$second_lastname', '$gender', '$nationality', '$typeId', '$phone', '$phone2', '$additionalInformation', '$email')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

}
