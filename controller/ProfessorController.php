<?php

class ProfessorController {

    /**
     *      
     */
    public function __construct() {
        $this->view = new View();
    }

    /**
     * @return array Data
     *      
     */
    public function insert() {
        if (SSession::getInstance()->permissions == 'A') {
            if (isset($_POST["id"])) {
                require 'model/ProfessorModel.php';
                $model = new ProfessorModel();

//            $typeId = $_POST["typeId"];
//            $id = $_POST["id"];
//            $email = $_POST["email"];
//            $name = $_POST["name"];
//            $firstLastName = $_POST["firstLastName"];
//            $secondLastName = $_POST["secondLastName"];
//            $gender = $_POST["gender"];
//            $nationality = $_POST["nationality"];
//            $phone = $_POST["phone"];
//            $phone2 = $_POST["phone2"];
//            $additionalInformation = $_POST["additionalInformation"];
//            $address = $_POST["address"];
//            $age = $_POST["age"];

                $result = $model->insertProfessor($_POST["typeId"], $_POST["id"], $_POST["nationality"], $_POST["name"], $_POST["firstLastName"], $_POST["secondLastName"], $_POST["address"], $_POST["gender"], $_POST["phone"], $_POST["phone2"], $_POST["email"], $_POST["additionalInformation"], $_POST["age"]);

                //$result = $model->insertProfessor($typeId, $id, $nationality, $name, $firstLastName, $secondLastName, $address, $gender, $phone, $phone2, $email, $additionalInformation, $age);
                echo json_encode($result);
            } else {
                $this->view->show("insertProfessorView.php");
            }//else
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return array Data
     *      
     */
    public function delete() {

        if (SSession::getInstance()->permissions == 'A') {
            require 'model/ProfessorModel.php';
            $model = new ProfessorModel();

            if (isset($_POST["id"])) {
                $result = $model->deleteProfessor($_POST["id"]);
                echo json_encode($result);
            } else {
                $result = $model->selectAllProfessor();
                $this->view->show("deleteProfessorView.php", $result);
            }//else
        } else {
            $this->view->show("indexView.php");
        }
    }

    public function update() {
        if (SSession::getInstance()->permissions == 'A') {
            require 'model/ProfessorModel.php';
            $model = new ProfessorModel();

            if (isset($_POST["id"]) /* && SSession::getInstance()->permissions == 'A' */) {
                $result = $model->updateProfessor($_POST["id"], $_POST["identification"], $_POST["name"], $_POST["firstLastName"], $_POST["secondLastName"], $_POST["gender"], $_POST["nationality"], $_POST["address"], $_POST["typeId"], $_POST["phone"], $_POST["phone2"], $_POST["additionalInformation"], $_POST["email"], $_POST["age"]);
                echo json_encode($result);
            } else {
                $result = $model->selectAllProfessor();
                $this->view->show("updateProfessorView.php", $result);
            }//else
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return array Data
     *      
     */
    public function select() {
        if (SSession::getInstance()->permissions == 'A') {
            require 'model/ProfessorModel.php';
            $model = new ProfessorModel();

            if (isset($_POST["id"]) /* && SSession::getInstance()->permissions == 'A' */) {
                $result = $model->selectProfessorData($_POST["id"]);
                echo json_encode($result);
            } else {
                $result = $model->selectAllProfessor();
                $this->view->show("selectProfessorView.php", $result);
            }//else        
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return array Data
     *      
     */
    public function personalSelection() {
        if (SSession::getInstance()->permissions == 'T') {
            require 'model/ProfessorModel.php';
            $model = new ProfessorModel();

            $session = SSession::getInstance();
            //$id = "301110222";

            $result = $model->selectProfessor($session->identification);
            $this->view->show("selectProfessorDataView.php", $result);
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return array Data
     *      
     */
    public function updatePersonal() {
        if (SSession::getInstance()->permissions == 'T') {
            require 'model/ProfessorModel.php';
            $model = new ProfessorModel();
            $session = SSession::getInstance();

            if (isset($_POST["identification"])) {
                $result = $model->updateProfessor($session->identification, $_POST["identification"], $_POST["name"], $_POST["firstLastName"], $_POST["secondLastName"], $_POST["gender"], $_POST["nationality"], $_POST["address"], $_POST["typeId"], $_POST["phone"], $_POST["phone2"], $_POST["additionalInformation"], $_POST["email"], $_POST["age"]);
                echo json_encode($result);
            } else {
                $result = $model->selectProfessor($session->identification);
                $this->view->show("updateProfessorDataView.php", $result);
            }//else  
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return array Data
     *      
     */
    function change() {
        if (SSession::getInstance()->permissions == 'T' || SSession::getInstance()->permissions == 'A' || SSession::getInstance()->permissions == 'S') {
            if (isset($_POST["new"])) {
                require 'model/ProfessorModel.php';
                $model = new ProfessorModel();
                $session = SSession::getInstance();

                $result = $model->change($session->identification, $_POST["new"]);
                echo json_encode($result);
            } else {
                $this->view->show("changePasswordView.php");
            }
        } else {
            $this->view->show("indexView.php");
        }
    }

//change
}
