<?php
/**
 * @authors <kevin.sandoval@ucr.ac.cr><diego.cendenofonseca@ucr.ac.cr><elena.calderonfernandez@ucr.ac.cr><brogudbarrientos@gmail.com>
 * @version 1.0
 * @copyright (c) 2017, Funcion Academia Musical
 * @access public
 * @category controller
 * Class Semestre   
 */
class SemesterController {

    function __construct() {
        $this->view = new View();
        require 'model/SemesterModel.php';
    }

    /**
     * @return null
     * @param integer $year anio del semestre
     * @param integer $semester numero de semestre
     * Funcion para insertar semestre
     */
    function insert() {
        if (SSession::getInstance()->permissions == 'A') {
            if (isset($_POST["year"]) && isset($_POST["semester"])) {
                $model = new SemesterModel();
                $result = $model->insert($_POST["year"], $_POST["semester"]);
                echo json_encode($result);
            } else {
                $this->view->show("insertSemesterView.php");
            }
        } else {
            $this->view->show("404View.php");
        }
    }

    /**
     * @return null
     * @param integer $id Identificador de semestre
     * Funcion para eliminar semestre
     */
    function delete() {
        if (SSession::getInstance()->permissions == 'A') {
            $model = new SemesterModel();
            if (isset($_POST["id"])) {                
                $result = $model->delete($_POST["id"]);
                echo json_encode($result);
            } else {
                $result = $model->selectAll();
                $this->view->show("deleteSemesterView.php", $result);
            }
        } else {
            $this->view->show("404View.php");
        }
    }

    /**
     * @return null
     * @param integer $id Identificador de semestre
     * Funcion para seleccionar semestre
     */
    function select() {
        if (SSession::getInstance()->permissions == 'A') {
            $model = new SemesterModel();
            if (isset($_POST["id"])) {
                $result = $model->select($_POST["id"]);
                echo json_encode($result);
            } else {
                $result = $model->selectAll();
                $this->view->show("selectSemesterView.php", $result);
            }
        } else {
            $this->view->show("404View.php");
        }
    }
}