<?php

class Professor extends Person {

    private $expedient, $birthdate, $address;

    function __construct($ID, $celPhone, $firstLastname, $gender, $idType, $identification, $name, $nationality, $phone, $secondLastname, $expedient, $birthdate, $address) {
        parent::__construct($ID, $celPhone, $firstLastname, $gender, $idType, $identification, $name, $nationality, $phone, $secondLastname);
        $this->address = $address;
        $this->birthdate = $birthdate;
        $this->expedient = $expedient;
    }

    function getExpedient() {
        return $this->expedient;
    }

    function getBirthdate() {
        return $this->birthdate;
    }

    function getAddress() {
        return $this->address;
    }

    function setExpedient($expedient) {
        $this->expedient = $expedient;
    }

    function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
    }

    function setAddress($address) {
        $this->address = $address;
    }

}
