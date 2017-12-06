<?php

class AdminModel {

    private $db;

    function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    function insert(Person $admin) {
        $id = $admin->getId();
        $email = $admin->getEmail();
        $name = $admin->getName();
        $firstLastname = $admin->getFirstLastName();
        $secondLastname = $admin->getSecondLastName();

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

    function delete(Person $admin) {
        $id = $admin->getId();
        
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

}
