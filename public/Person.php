<?php

class Person {

    private $ID;
    private $identification;
    private $name;
    private $firstLastname;
    private $secondLastname;
    private $gender;
    private $nationality;
    private $idType; //Cédula Nacional, Pasaporte, Dimex
    private $phone;
    private $celPhone;
    private $user = array();

    function __construct($ID, $identification, $name, $firstLastname, $secondLastname, $gender, $nationality, $idType, $phone, $celPhone, $user = array()) {
        $this->ID = $ID;
        $this->celPhone = $celPhone;
        $this->firstLastname = $firstLastname;
        $this->gender = $gender;
        $this->idType = $idType;
        $this->identification = $identification;
        $this->name = $name;
        $this->nationality = $nationality;
        $this->phone = $phone;
        $this->secondLastname = $secondLastname;
        $this->user = $user;
    }

    function getUser() {
        return $this->user;
    }

    function getID() {
        return $this->ID;
    }

    function getIdentification() {
        return $this->identification;
    }

    function getName() {
        return $this->name;
    }

    function getFirstLastname() {
        return $this->firstLastname;
    }

    function getSecondLastname() {
        return $this->secondLastname;
    }

    function getGender() {
        return $this->gender;
    }

    function getNationality() {
        return $this->nationality;
    }

    function getIdType() {
        return $this->idType;
    }

    function getPhone() {
        return $this->phone;
    }

    function getCelPhone() {
        return $this->celPhone;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setIdentification($identification) {
        $this->identification = $identification;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setFirstLastname($firstLastname) {
        $this->firstLastname = $firstLastname;
    }

    function setSecondLastname($secondLastname) {
        $this->secondLastname = $secondLastname;
    }

    function setGender($gender) {
        $this->gender = $gender;
    }

    function setNationality($nationality) {
        $this->nationality = $nationality;
    }

    function setIdType($idType) {
        $this->idType = $idType;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setCelPhone($celPhone) {
        $this->celPhone = $celPhone;
    }

}
