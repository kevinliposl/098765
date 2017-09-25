<?php

class UserModel {

    protected $database;

    public function __construct() {
        $this->database = SPDO::singleton();
    }

    public function logIn($email, $password) {

        return NULL;
    }

    public function insertUser($email, $name, $lastname, $address, $password) {

        return NULL;
    }

    public function updateUser($email, $name, $lastname, $address, $password) {

        return NULL;
    }

    public function deleteUser($email) {

        return NULL;
    }

    public function selectUser($email) {

        return NULL;
    }
}
