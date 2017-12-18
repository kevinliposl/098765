<?php

class AdminModel {

    private $db;

    function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    function insert($id,$email,$name,$firstLastname,$secondLastname) {
        $query = $this->db->prepare("call sp_insert_admin('$id','$email','$name','$firstLastname','$secondLastname')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    function select($id) {
        $query = $this->db->prepare("call sp_select_admin($id)");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    function delete($id) {
        $query = $this->db->prepare("call sp_delete_admin('$id')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    function selectAll() {
        $query = $this->db->prepare("call sp_select_all_admin()");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    function changePassword($id,$password) {
        $query = $this->db->prepare("call sp_change_password_admin('$id','$password')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
}
