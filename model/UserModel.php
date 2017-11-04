<?php

class UserModel {

    private $db;

    function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    function logIn($email, $password) {
        $query = $this->db->prepare("call sp_user_login('$email','$password')");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
    
    function change($id, $new_pass){
        $query = $this->db->prepare("call sp_update_password_user('$id', '$new_pass')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }//change
}
