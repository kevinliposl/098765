<?php

class Person {

    private $id;
    private $email;
    private $name;
    private $firstLastName;
    private $secondLastName;

    function __construct($id = null, $email = null, $name = null, $firstLastName = null, $secondLastName = null) {
        $this->id = $id;
        $this->email = $email;
        $this->firstLastName = $firstLastName;
        $this->secondLastName = $secondLastName;
        $this->name = $name;
    }

    function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

    function getName() {
        return $this->name;
    }

    function getFirstLastName() {
        return $this->firstLastName;
    }

    function getSecondLastName() {
        return $this->secondLastName;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setFirstLastName($firstLastName) {
        $this->firstLastName = $firstLastName;
    }

    function setSecondLastName($secondLastName) {
        $this->secondLastName = $secondLastName;
    }

}
