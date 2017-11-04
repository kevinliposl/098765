<?php

class StudentModel {

    private $db;

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

    public function updateStudent($id, $oldId, $idType, $email, $name, $firstLastName, $secondLastName, $age, $address, $gender, $nationality, $phoneOne, $phoneTwo, $contactName, $contactRelationship, $contactPhone, $contactEmail) {
        $query = $this->db->prepare("call sp_update_student('$id', '$oldId', '$idType', '$email', '$name', '$firstLastName', '$secondLastName', '$age', '$address', '$gender', '$nationality', '$phoneOne', '$phoneTwo', '$contactName', '$contactRelationship', '$contactPhone', '$contactEmail')");
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

    public function selectAllDeleteStudent() {
        $query = $this->db->prepare("call sp_select_all_delete_student()");
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

    public function selectDeleteStudent($id, $tipo) {
        $query = $this->db->prepare("call sp_select_delete_student('$id', '$tipo')");
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

    public function getStudentExp($id) {
        $query = $this->db->prepare("call sp_exp_student('$id')");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    public function reactivateStudent($id, $tipo) {
        $query = $this->db->prepare("call sp_reactivate_student('$id', '$tipo')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    public function selectStudentEnrolled() {
        $query = $this->db->prepare("call sp_select_student_enrolled()");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

}
