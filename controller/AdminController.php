<?php

class AdminController {

    public function __construct() {
        $this->view = new View();
    }

    public function insertAdmin() {
        require 'model/AdminModel.php';
        $model = new AdminModel();

        $id = $_POST["id"];
        $email = $_POST["email"];
        $name = $_POST["name"];
        $firstLastName = $_POST["firstLastName"];
        $secondLastName = $_POST["secondLastName"];

        $result = $model->insertAdmin($id, $email, $name, $firstLastName,$secondLastName);
        echo json_encode($result);
    }
    
    public function insertProfessor() {
        require 'model/AdminModel.php';
        $model = new AdminModel();
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
        
        $result = $model->insertProfessor($typeId, $id, $name, $firstLastName, $secondLastName, "", "", "", $gender, $phone, $phone2, $email, $additionalInformation);
        echo json_encode($result);
    }
    
    public function insertTeacherView(){
        $this->view->show("insertTeacherView.php");
    }
    
}
