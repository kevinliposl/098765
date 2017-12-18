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
    
    function rememberPassword($email) {
        $query = $this->db->prepare("call sp_remember_password('$email')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
   
}
