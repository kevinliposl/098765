<?php

class User {

    private $email;
    private $password;
    private $permissions;
    
    function User($email){
        $this->email = $email;
    }
            
    function __construct($email, $password, $permissions) {
        $this->email = $email;
        $this->password = $password;
        $this->permissions = $permissions;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getPermissions() {
        return $this->permissions;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setPermissions($permissions) {
        $this->permissions = $permissions;
    }

}
