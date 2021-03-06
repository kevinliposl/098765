<?php

/**
 * @authors <kevin.sandoval@ucr.ac.cr><diego.cendenofonseca@ucr.ac.cr><elena.calderonfernandez@ucr.ac.cr><brogudbarrientos@gmail.com>
 * @version 1.0
 * @copyright (c) 2017, Funcion Academia Musical
 * @access public
 * @category controller
 * Class Horario     
 */
class ScheduleController {

    function __construct() {
        $this->view = new View();   
    }

    /**
     * @return null
     * @param integer $id Identificador del curso
     * @param string $start Hora de inicio de curso
     * @param string $end Hora de finalizacion de curso
     * @param string $day Dia de inpartir el curso
     * Funcion para insertar horario
     */
    function insert() {
        if (SSession::getInstance()->permissions == 'A' || SSession::getInstance()->permissions == 'T') {    
            if (isset($_POST["ID"]) && isset($_POST["start"]) && isset($_POST["end"]) && isset($_POST["day"])) {
                require 'model/ScheduleModel.php';
                $model = new ScheduleModel();
                $result = $model->insert($_POST["ID"], $_POST["start"], $_POST["end"], $_POST["day"]);
                echo json_encode($result);
            } else {
                require 'model/SemesterModel.php';
                $model = new SemesterModel();
                $result = $model->selectAllSemesterWithAssignments();
                $this->view->show("insertScheduleView.php", $result);
            }
        } else {
            $this->view->show("404View.php");
        }
    }

    /**
     * @return null
     * @param integer $id Identificador de curso
     * Funcion para eliminar horario
     */
    function delete() {
        if (SSession::getInstance()->permissions == 'A') {
            if (isset($_POST["ID"]) && isset($_POST["ID_schedule"])) {
                require 'model/ScheduleModel.php';
                $model = new ScheduleModel();
                $result = $model->delete($_POST["ID"],$_POST["ID_schedule"]);
                echo json_encode($result);
            } else {    
                require 'model/SemesterModel.php';
                $model = new SemesterModel();
                $result = $model->selectAllSemesterWithAssignmentsAndSchedule();
                $this->view->show("deleteScheduleView.php", $result);
            }
        } else {
            $this->view->show("404View.php");
        }
    }

    /**
     * @return null
     * @param integer $id Identificador de semestre
     * Funcion para seleccionar el horario del semestre
     */
    function select() {
        if (SSession::getInstance()->permissions == 'A' || SSession::getInstance()->permissions == 'T') {
            if (isset($_POST["ID_Semester"])) {
                require 'model/ScheduleModel.php';
                $model = new ScheduleModel();
                $result = $model->select($_POST["ID_Semester"]);
                echo json_encode($result);
            } else {
                require 'model/SemesterModel.php';
                $model = new SemesterModel();
                $result = $model->selectAllSemesterWithAssignments();
                $this->view->show("selectScheduleView.php", $result);
            }
        } else {
            $this->view->show("404View.php");
        }
    }

    /**
     * @return null
     * @param integer $id Identificador de curso
     * Funcion para seleccionar los cursos del semestre sin horario
     */
    //FUNCION PARA LA VISTA ELIMINAR
    function selectWithSchedule() {
        if (SSession::getInstance()->permissions == 'A') {
            if (isset($_POST["ID_Semester"])) {
                require 'model/ScheduleModel.php';
                $model = new ScheduleModel();
                $result = $model->selectWithSchedule($_POST["ID_Semester"]);
                echo json_encode($result);
            } else{
                $this->view->show("404View.php");
            }
        } else {
            $this->view->show("404View.php");
        }
    }

    ///METODO PARA VISTA ELIMINAR
    function selectCourseSchedules() {
        if (SSession::getInstance()->permissions == 'A' || SSession::getInstance()->permissions == 'T') {
            if (isset($_POST["ID_appointment"])) {
                require 'model/ScheduleModel.php';
                $model = new ScheduleModel();
                $result = $model->selectCourseSchedules($_POST["ID_appointment"]);
                echo json_encode($result);
            } else{
                $this->view->show("404View.php");
            }
        } else {
            $this->view->show("404View.php");
        }
    }
}


