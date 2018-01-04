<?php

class ProfessorModel {

    private $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public function insertProfessor($identification, $name, $firstLastName, $secondLastName, $gender, $nationality, $address, $typeId, $phone, $cel_phone, $expedient, $email, $birthdate) {
        $query = $this->db->prepare("call sp_insert_teacher('$identification', '$name','$firstLastName', '$secondLastName', '$gender', '$nationality','$address', '$typeId', '$phone', '$cel_phone', '$expedient', '$email', '$birthdate')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    public function selectAllProfessor() {
        $query = $this->db->prepare("call sp_select_all_teacher()");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    public function updateProfessor($id, $identification, $name, $firstLastname, $secondLastname, $gender, $nationality, $address, $typeId, $phone, $phone2, $additionalInformation, $email, $age) {
        $query = $this->db->prepare("call sp_update_teacher('$id','$identification', '$name', '$firstLastname', '$secondLastname', '$gender', '$nationality', '$address' ,'$typeId', '$phone', '$phone2', '$additionalInformation', '$email', '$age')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    public function deleteProfessor($id) {
        $query = $this->db->prepare("call sp_delete_teacher('$id')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    public function selectProfessor($id) {
        $query = $this->db->prepare("call sp_select_teacher('$id')");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function selectProfessorData($id) {
        $query = $this->db->prepare("call sp_select_teacher('$id')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    function change($id, $new_pass) {
        $query = $this->db->prepare("call sp_update_password_user('$id', '$new_pass')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

//change
}
