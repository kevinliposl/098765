<?php

class AdminModel {

    private $db;

    function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    function insert($id, $email, $name, $first_lastname, $second_lastname) {
        $query = $this->db->prepare("call sp_insert_admin('$id','$email','$name','$first_lastname','$second_lastname')");
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
        $query = $this->db->prepare("call sp_delete_admin($id)");
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

}
