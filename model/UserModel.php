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
}
