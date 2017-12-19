<?php

/**
 * @author Diego Cedeño <diego.cendenofonseca@ucr.ac.cr>
 * @version 1.0
 * @copyright (c) 2017, Funcion Academia Musical
 * @access public
 * @category controller
 * Class Actividad de clase     
 */
class ClassActivityController {

    public function __construct() {
        $this->view = new View();
    }

    /**
     * @return null
     * Funcion para seleccionar actividad de clase
     */
    public function select() {
        if (SSession::getInstance()->permissions == 'T') {
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $session = SSession::getInstance();
            $result = $model->selectCourseClassActivity($session->identification);
            $this->view->show("selectClassActivityView.php", $result);
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * Funcion para seleccionar el historial de actividades
     */
    public function record() {
        if (SSession::getInstance()->permissions == 'T') {
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $session = SSession::getInstance();
            $result = $model->selectCourseClassActivity($session->identification);
            $this->view->show("selectRecordStudentForProfessorView.php", $result);
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * @param integer $appointment Identificador de actividad
     * Funcion para seleccionar actividad por estudiante
     */
    public function selectStudentClassActivity() {
        if (isset($_POST["appointment"]) && SSession::getInstance()->permissions == 'T') {
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectStudentClassActivity($_POST['appointment']);
            echo json_encode($result);
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * @param integer $identification Identificador de entidad
     * Funcion para seleccionar la informacion de la actividad especifica
     */
    public function selectInformationStudentClassActivity() {
        if (isset($_POST["identification"]) && SSession::getInstance()->permissions == 'T') {
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectInformationStudentClassActivity($_POST['identification']);
            echo json_encode($result);
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * @param integer $appointment Identificador de asignacion
     * @param integer $identification Identificador de actividad
     * Funcion para seleccionar los consecutivos de clases
     */
    public function selectConsecutiveClassActivity() {
        if (isset($_POST["appointment"]) && isset($_POST["identification"]) && SSession::getInstance()->permissions == 'T') {
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectConsecutiveClassActivity($_POST['appointment'], $_POST['identification']);
            echo json_encode($result);
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * @param integer $appointment Identificador de asignacion
     * @param integer identification Identificador de entidad
     * @param integer $consecutive Identificador de observacion
     * Funcion para seleccionar la actividad de clase completa
     */
    public function selectClassActivity() {
        if (isset($_POST["appointment"]) && isset($_POST["identification"]) && isset($_POST["consecutive"]) && SSession::getInstance()->permissions == 'T') {
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectClassActivity($_POST['appointment'], $_POST['identification'], $_POST['consecutive']);
            echo json_encode($result);
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
     * Funcion para insertar administrador
     */
    public function selectRecordStudentClassActivity() {
        if (isset($_POST["appointment"]) && isset($_POST["identification"]) && SSession::getInstance()->permissions == 'T') {
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectRecordStudentClassActivity($_POST['appointment'], $_POST['identification']);
            echo json_encode($result);
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
     * Funcion para insertar administrador
     */
    public function selectRecordContentClassActivity() {
        if (isset($_POST["appointment"]) && isset($_POST["identification"]) && isset($_POST["consecutive"]) && SSession::getInstance()->permissions == 'T') {
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->selectRecordContentClassActivity($_POST['appointment'], $_POST['identification'], $_POST['consecutive']);
            echo json_encode($result);
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
     * Funcion para insertar administrador
     */
    public function insert() {
        if (isset($_POST["appointment"]) && isset($_POST["student"]) && isset($_POST["consecutive"]) && isset($_POST["date"]) && isset($_POST["typeA"]) && isset($_POST["contents"]) && isset($_POST["count"]) && isset($_POST["observation"]) && SSession::getInstance()->permissions == 'T') {
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->insert($_POST["appointment"], $_POST["student"], $_POST["consecutive"], $_POST["date"], $_POST['typeA'], $_POST['contents'], $_POST['count'], $_POST['observation']);
            echo json_encode($result);
        } else if (SSession::getInstance()->permissions == 'T') {
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $session = SSession::getInstance();
            $result = $model->selectCourseClassActivity($session->identification);
            $this->view->show("insertClassActivityView.php", $result);
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * @param integer appointment Identificador de entidad
     * @param integer student Email de entidad
     * @param integer consecutive Nombre de entidad
     * @param integer typeA Apellido de entidad
     * @param integer contentsNew Apellido de entidad
     * @param integer countNew Apellido de entidad
     * @param integer contentsDelete Apellido de entidad
     * @param integer countDelete Apellido de entidad
     * @param integer observation Apellido de entidad
     * Funcion para actualizar la actividad de clase
     */
    public function update() {
        if (isset($_POST["appointment"]) && isset($_POST["student"]) && isset($_POST["consecutive"]) && isset($_POST["date"]) && isset($_POST["typeA"]) && isset($_POST["contentsNew"]) && isset($_POST["countNew"]) && isset($_POST["contentsDelete"]) && isset($_POST["countDelete"]) && isset($_POST["observation"]) && SSession::getInstance()->permissions == 'T') {
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $result = $model->update($_POST["appointment"], $_POST["student"], $_POST["consecutive"], $_POST["date"], $_POST['typeA'], $_POST['contentsNew'], $_POST['countNew'], $_POST['contentsDelete'], $_POST['countDelete'], $_POST['observation']);
            echo json_encode($result);
        } else if (SSession::getInstance()->permissions == 'T') {
            require 'model/ClassActivityModel.php';
            $model = new ClassActivityModel();
            $session = SSession::getInstance();
            $result = $model->selectCourseClassActivity($session->identification);
            $this->view->show("updateClassActivityView.php", $result);
        } else {
            $this->view->show("indexView.php");
        }
    }
}