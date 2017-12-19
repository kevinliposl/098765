<?php
/**
 * @authors <kevin.sandoval@ucr.ac.cr><diego.cendenofonseca@ucr.ac.cr><elena.calderonfernandez@ucr.ac.cr><brogudbarrientos@gmail.com>
 * @version 1.0
 * @copyright (c) 2017, Funcion Academia Musical
 * @access public
 * @category controller
 * Class Estudiante     
 */
class StudentController {

    function __construct() {
        $this->view = new View();
    }

    /**
     * @return null
     * @param integer $id Identificador de entidad
     * @param string $email Email de entidad
     * @param string $name Nombre de entidad
     * @param string $firstLastName Apellido de entidad
     * @param string $secondLastName Apellido de entidad
     * @param string $idType tipo de identificacion de entidad
     * @param integer $age edad de entidad
     * @param string $address direccion de entidad
     * @param string $gender genero de entidad
     * @param string $nationality nacionalidad de entidad
     * @param string $phoneOne telefono de entidad
     * @param string $phoneTwo telefono de entidad
     * @param string $contactName nombre de contacto de entidad
     * @param string $contactRelationship parentezco de contacto
     * @param string $contactPhone telefono de contacto
     * @param string $contactEmail correo de contacto
     * Funcion para insertar estudiante
     */
    function insertStudent() {
        $ssession = SSession::getInstance();
        if ($ssession->__isset("identification") && $ssession->__isset("permissions") && $ssession->__get("permissions") === "A") {
            if (isset($_POST["id"]) && isset($_POST["email"])) {
                require 'model/StudentModel.php';
                $model = new StudentModel();
                $result = $model->insertStudent($_POST["id"], $_POST['idType'], $_POST["email"], $_POST["name"], $_POST["firstLastName"], $_POST["secondLastName"], $_POST["age"], $_POST["address"], $_POST["gender"], $_POST["nationality"], $_POST["phoneOne"], $_POST["phoneTwo"], $_POST["contactName"], $_POST["contactRelationship"], $_POST["contactPhone"], $_POST["contactEmail"]);
                echo json_encode($result);
                if ($result["result"] === '1') {
                    $mail = SMail::getInstance();
                    $mail->sendMail($_POST["email"], 'Contraseña de ingreso al sitio', 'Hola, gracias por formar parte de la academia, la contraseña'
                            . ' de ingreso al sitio es... <br><h1>' . $result['password'] . '</h1>');
                }
            } else {
                $this->view->show("insertStudentView.php");
            }
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * @param integer $id Identificador de entidad
     * Funcion para eliminar estudiante
     */
    function deleteStudent() {
        require 'model/StudentModel.php';
        $ssession = SSession::getInstance();
        if ($ssession->__isset("identification") && $ssession->__isset("permissions") && $ssession->__get("permissions") === "A") {
            if (!isset($_POST["id"]) && !isset($_POST["email"])) {
                $model = new StudentModel();
                $result = $model->selectAllStudent();
                $this->view->show("deleteStudentView.php", $result);
            } else {
                $model = new StudentModel();
                $result = $model->deleteStudent($_POST['id']);
                echo json_encode($result);
            }
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * @param integer $id Identificador de entidad
     * Funcion para obtener expediente de estudiante 
     */
    function getStudentExp() {
        require 'model/StudentModel.php';
        $ssession = SSession::getInstance();
        if ($ssession->__isset("identification") && $ssession->__isset("permissions") && $ssession->__get("permissions") === "S") {
            $model = new StudentModel();
            $result = $model->getStudentExp($ssession->__get("identification"));
            $this->view->show("getStudentExpView.php", $result);
        } else {
            $this->view->show("indexView.php", null);
        }
    }

    /**
     * @return null
     * @param integer $id Identificador de entidad
     * @param string $email Email de entidad
     * Funcion para reactivar estudiante
     */
    function reactivateStudent() {
        require 'model/StudentModel.php';
        $ssession = SSession::getInstance();
        if ($ssession->__isset("identification") && $ssession->__isset("permissions") && $ssession->__get("permissions") === "A") {
            if (!isset($_POST["id"]) && !isset($_POST["email"])) {
                $model = new StudentModel();
                $result = $model->selectAllDeleteStudent();
                $this->view->show("reactivateView.php", $result);
            } else {
                $model = new StudentModel();
                $result = $model->reactivateStudent($_POST['id'], $_POST['tipo']);
                echo json_encode($result);
            }
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * @param integer $id Identificador de entidad
     * @param string $email Email de entidad
     * @param string $name Nombre de entidad
     * @param string $firstLastName Apellido de entidad
     * @param string $secondLastName Apellido de entidad
     * @param string $idType tipo de identificacion de entidad
     * @param integer $age edad de entidad
     * @param string $address direccion de entidad
     * @param string $gender genero de entidad
     * @param string $nationality nacionalidad de entidad
     * @param string $phoneOne telefono de entidad
     * @param string $phoneTwo telefono de entidad
     * @param string $contactName nombre de contacto de entidad
     * @param string $contactRelationship parentezco de contacto
     * @param string $contactPhone telefono de contacto
     * @param string $contactEmail correo de contacto
     * Funcion para actualizar estudiante
     */
    function updateStudent() {
        require 'model/StudentModel.php';
        $ssession = SSession::getInstance();
        if ($ssession->__isset("identification") && $ssession->__isset("permissions") && $ssession->__get("permissions") === "A") {
            if (!isset($_POST["id"]) && !isset($_POST["email"])) {
                $model = new StudentModel();
                $result = $model->selectAllStudent();
                $this->view->show("updateStudentView.php", $result);
            } else {
                $model = new StudentModel();
                $result = $model->updateStudent($_POST["id"], $_POST["oldId"], $_POST['idType'], $_POST["email"], $_POST["name"], $_POST["firstLastName"], $_POST["secondLastName"], $_POST["age"], " ", $_POST["gender"], $_POST["nationality"], $_POST["phoneOne"], $_POST["phoneTwo"], $_POST["contactName"], $_POST["contactRelationship"], $_POST["contactPhone"], $_POST["contactEmail"]);
                echo json_encode($result);
            }
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * @param integer $id Identificador de entidad
     * @param string $email Email de entidad
     * @param string $name Nombre de entidad
     * @param string $firstLastName Apellido de entidad
     * @param string $secondLastName Apellido de entidad
     * @param string $idType tipo de identificacion de entidad
     * @param integer $age edad de entidad
     * @param string $address direccion de entidad
     * @param string $gender genero de entidad
     * @param string $nationality nacionalidad de entidad
     * @param string $phoneOne telefono de entidad
     * @param string $phoneTwo telefono de entidad
     * @param string $contactName nombre de contacto de entidad
     * @param string $contactRelationship parentezco de contacto
     * @param string $contactPhone telefono de contacto
     * @param string $contactEmail correo de contacto
     * Funcion para actualizar informacion personal
     */
    function updatePersonalDataStudent() {
        require 'model/StudentModel.php';
        $ssession = SSession::getInstance();
        if ($ssession->__isset("identification") && $ssession->__isset("permissions") && $ssession->__get("permissions") === "S") {
            if (!isset($_POST["id"])) {
                $model = new StudentModel();
                $id = $ssession->__get("identification");
                $result = $model->selectStudent($id);
                $this->view->show("updatePersonalDataStudentView.php", $result);
            } else {
                $model = new StudentModel();
                $result = $model->updateStudent($_POST["id"], $_POST["oldId"], $_POST['idType'], $_POST["email"], $_POST["name"], $_POST["firstLastName"], $_POST["secondLastName"], $_POST["age"], " ", $_POST["gender"], $_POST["nationality"], $_POST["phoneOne"], $_POST["phoneTwo"], $_POST["contactName"], $_POST["contactRelationship"], $_POST["contactPhone"], $_POST["contactEmail"]);
                if ($result === "1") {
                    $ssession->__set("identification", $_POST["id"]);
                }
                echo json_encode($result);
            }
        } else {
            $this->view->show("indexView.php", null);
        }
    }

    /**
     * @return null
     * @param integer $id Identificador de entidad
     * @param string $email Email de entidad
     * Funcion para obtener datos estudiante
     */
    function getStudentData() {
        require 'model/StudentModel.php';
        $ssession = SSession::getInstance();
        if ($ssession->__isset("identification") && $ssession->__isset("permissions") && $ssession->__get("permissions") === "A") {
            if (!isset($_POST["id"]) && !isset($_POST["email"])) {
                $model = new StudentModel();
                $result = $model->selectAllStudent();
                $this->view->show("getStudentDataView.php", $result);
            }
        } else {
            $this->view->show("indexView.php", null);
        }
    }

    /**
     * @return null
     * @param integer $id Identificador de entidad
     * Funcion para seleccionar estudiante
     */
    function selectStudent() {
        require 'model/StudentModel.php';
        $ssession = SSession::getInstance();
        if ($ssession->__isset("identification") && $ssession->__isset("permissions") && $ssession->__get("permissions") === "A" || $ssession->__get("permissions") === "S" || $ssession->__get("permissions") === "T") {
            $model = new StudentModel();
            $id = $_POST["id"];
            $result = $model->selectStudent($id);
            echo json_encode($result);
        } else {
            $result = 0;
            echo json_encode($result);
        }
    }

    /**
     * @return null
     * @param integer $id Identificador de entidad
     * @param string $email Email de entidad
     * Funcion para eliminar estudiante
     */
    function selectDeleteStudent() {
        require 'model/StudentModel.php';
        $ssession = SSession::getInstance();
        if ($ssession->__isset("identification") && $ssession->__isset("permissions") && $ssession->__get("permissions") === "A") {
            $model = new StudentModel();
            $result = $model->selectDeleteStudent($_POST["id"], $_POST["tipo"]);
            echo json_encode($result);
        } else {
            $result = 0;
            echo json_encode($result);
        }
    }
}