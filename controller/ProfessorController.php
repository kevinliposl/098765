<?php

class ProfessorController {

    public function __construct() {
        $this->view = new View();
    }

    public function insert() {

        if (isset($_POST["id"]) /* && SSession::getInstance()->permissions == 'A' */) {
            require 'model/ProfessorModel.php';
            $model = new ProfessorModel();

            $typeId = $_POST["typeId"];
            $id = $_POST["id"];
            $email = $_POST["email"];
            $name = $_POST["name"];
            $firstLastName = $_POST["firstLastName"];
            $secondLastName = $_POST["secondLastName"];
            $gender = $_POST["gender"];
            $nationality = $_POST["nationality"];
            $phone = $_POST["phone"];
            $phone2 = $_POST["phone2"];
            $additionalInformation = $_POST["additionalInformation"];
            $address = $_POST["address"];
            $age = $_POST["age"];

            $result = $model->insertProfessor($typeId, $id, $nationality, $name, $firstLastName, $secondLastName, $address, $gender, $phone, $phone2, $email, $additionalInformation, $age);
            echo json_encode($result);
        } else {
            $this->view->show("insertProfessorView.php");
        }//else
    }
    
    public function delete() {

        require 'model/ProfessorModel.php';
        $model = new ProfessorModel();

        if (isset($_POST["id"]) /* && SSession::getInstance()->permissions == 'A' */) {
            $result = $model->deleteProfessor($_POST["id"]);
            echo json_encode($result);
        } else {
            $result = $model->selectAllProfessor();
            $this->view->show("deleteProfessorView.php", $result);
        }//else
    }

    public function update() {

        require 'model/ProfessorModel.php';
        $model = new ProfessorModel();

        if (isset($_POST["id"]) /* && SSession::getInstance()->permissions == 'A' */) {
            $result = $model->updateProfessor($_POST["id"], $_POST["identification"], $_POST["name"], $_POST["firstLastName"], $_POST["secondLastName"], $_POST["gender"], $_POST["nationality"], $_POST["address"], $_POST["typeId"], $_POST["phone"], $_POST["phone2"], $_POST["additionalInformation"], $_POST["email"], $_POST["age"]);
            echo json_encode($result);
        } else {
            $result = $model->selectAllProfessor();
            $this->view->show("updateProfessorView.php", $result);
        }//else
    }

    public function select() {

        require 'model/ProfessorModel.php';
        $model = new ProfessorModel();

        if (isset($_POST["id"]) /* && SSession::getInstance()->permissions == 'A' */) {
            $result = $model->selectProfessorData($_POST["id"]);
            echo json_encode($result);
        } else {
            $result = $model->selectAllProfessor();
            $this->view->show("selectProfessorView.php", $result);
        }//else        
    }

    public function personalSelection() {
        require 'model/ProfessorModel.php';
        $model = new ProfessorModel();

        $id = "301110222";

        $result = $model->selectProfessor($id);
        $this->view->show("selectProfessorDataView.php", $result);
    }

    public function updatePersonal() {

        require 'model/ProfessorModel.php';
        $model = new ProfessorModel();

        if (isset($_POST["identification"]) /* && SSession::getInstance()->permissions == 'T' */) {
            $result = $model->updateProfessor("301110222", $_POST["identification"], $_POST["name"], $_POST["firstLastName"], $_POST["secondLastName"], $_POST["gender"], $_POST["nationality"], $_POST["address"], $_POST["typeId"], $_POST["phone"], $_POST["phone2"], $_POST["additionalInformation"], $_POST["email"], $_POST["age"]);
            echo json_encode($result);
        } else {
            $result = $model->selectProfessor("301110222");
            $this->view->show("updateProfessorDataView.php", $result);
        }//else  
    }
}
