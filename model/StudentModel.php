<?php

class StudentModel {

    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public function insertStudent($id, $idType, $email, $name, $firstLastName, $secondLastName, $age, $address, $gender, $nationality, $phoneOne, $phoneTwo, $contactName, $contactRelationship, $contactPhone, $contactEmail) {
        $query = $this->db->prepare("call sp_insert_student('$id', '$idType', '$email', '$name', '$firstLastName', '$secondLastName', '$age', '$address', '$gender', '$nationality', '$phoneOne', '$phoneTwo', '$contactName', '$contactRelationship', '$contactPhone', '$contactEmail')");
        $query->execute();
        $result = $query->fetch();
        $query->closeCursor();
        return $result;
    }

    public function selectAllStudent() {
        $query = $this->db->prepare("call sp_select_all_student()");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    public function selectStudent($id) {
        $query = $this->db->prepare("call sp_select_student('$id')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
    
    public function selectStudentContact($id) {
        $query = $this->db->prepare("call sp_select_studentContact('$id')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    public function deleteStudent($id) {
        $query = $this->db->prepare("call sp_delete_student('$id')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

}
