<?php

class ProfessorModel {
    
    private $db;
    
    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }
    
    public function insertProfessor($typeId, $id, $nationality, $name, $first_lastname, $second_lastname, $address,
            $gender, $phone, $phone2, $email, $additionalInformation, $age) {
        $query = $this->db->prepare("call sp_insert_teacher('$id','$name','$first_lastname','$second_lastname', '$gender', '$nationality', '$address' ,'$typeId', '$phone', '$phone2', '$additionalInformation', '$email', '$age')");
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
    
    public function updateProfessor($id, $name, $firstLastname, $secondLastname, $gender, $nationality, $address, $typeId, $phone, $phone2, $additionalInformation, $email, $age){
        $query = $this->db->prepare("call sp_update_teacher('$id', '$name', '$firstLastname', '$secondLastname', '$gender', '$nationality', '$address' ,'$typeId', '$phone', '$phone2', '$additionalInformation', '$email', '$age')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
    
    public function deleteProfessor($id){
        $query = $this->db->prepare("call sp_delete_teacher('$id')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
    
    public function selectProfessor($id){
        $query = $this->db->prepare("call sp_select_teacher('$id')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
}