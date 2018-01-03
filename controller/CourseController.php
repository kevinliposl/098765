<?php

/**
 * @authors <kevin.sandoval@ucr.ac.cr>,<diego.cendenofonseca@ucr.ac.cr>,<elena.calderonfernandez@ucr.ac.cr>,<brogudbarrientos@gmail.com>
 * @version 1.0
 * @copyright (c) 2017, Funcion Academia Musical
 * @access public
 * @category Controller
 * Class Course
 */
class CourseController {

    function __construct() {
        $this->view = new View();
    }

    /**
     * @return null
     * @param integer $initials Identificador de entidad
     * Funcion para seleccionar un curso
     */
    function select() {
        if (isset($_POST["initials"]) && SSession::getInstance()->permissions == 'A') {
            require 'model/CourseModel.php';
            $model = new CourseModel();
            $result = $model->select($_POST["initials"]);
            echo json_encode($result);
        } else if (SSession::getInstance()->permissions == 'A') {
            require 'model/CourseModel.php';
            $model = new CourseModel();
            $result = $model->selectAll();
            $this->view->show("selectCourseView.php", $result);
        } else {
            $this->view->show("indexView.php");
        }
    }

    function selectDelete() {
        if (isset($_POST["initials"]) && SSession::getInstance()->permissions == 'A') {
            require 'model/CourseModel.php';
            $model = new CourseModel();
            $result = $model->selectDelete($_POST["initials"]);
            echo json_encode($result);
        } else {
            echo json_decode('0');
        }
    }

    /**
     * @return null
     * Funcion para seleccionar todos los cursos
     */
    function selectAll() {
        if (SSession::getInstance()->permissions == 'A') {
            require 'model/CourseModel.php';
            $model = new CourseModel();
            $result = $model->selectAll();
            echo json_encode($result);
        } else {
            $this->view->show("404View.php");
        }
    }

    function selectAllCourseDeleted() {
        if (SSession::getInstance()->permissions == 'A') {
            if (isset($_POST['ID_Semester'])) {
                require 'model/CourseModel.php';
                $model = new CourseModel();
                $result = $model->selectAllCourseDeleted($_POST['ID_Semester']);
                echo json_encode($result);
            } else {
                $this->view->show("404View.php");
            }
        } else {
            $this->view->show("404View.php");
        }
    }

    /**
     * @return null
     * @param integer $initials Identificador de entidad
     * @param string $name Nombre de entidad
     * @param string $description descripcion de entidad
     * @param string $instrument instrumento de entidad
     * Funcion para insertar curso
     */
    function insert() {
        if (isset($_POST["initials"]) && isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["instrument"]) && SSession::getInstance()->permissions == 'A') {
            require 'model/CourseModel.php';
            $model = new CourseModel();
            $result = $model->insert($_POST["initials"], $_POST["name"], $_POST["description"], $_POST["instrument"]);
            echo json_encode($result);
        } else if (SSession::getInstance()->permissions == 'A') {
            $this->view->show("insertCourseView.php", null);
        } else {
            $this->view->show("404View.php");
        }
    }

    /**
     * @return null
     * @param integer $id Identificador de entidad
     * Funcion para eliminar curso
     */
    function delete() {
        if (isset($_POST["initials"]) && SSession::getInstance()->permissions == 'A') {
            require 'model/CourseModel.php';
            $model = new CourseModel();
            $result = $model->delete($_POST["initials"]);
            echo json_encode($result);
        } else if (SSession::getInstance()->permissions == 'A') {
            require 'model/CourseModel.php';
            $model = new CourseModel();
            $result = $model->selectAll();
            $this->view->show("deleteCourseView.php", $result);
        } else {
            $this->view->show("404View.php");
        }
    }

    /**
     * @return null
     * @param integer $id Identificador de entidad
     * Funcion para reactivar curso
     */
    function reactivate() {
        if (isset($_POST["initials"]) && SSession::getInstance()->permissions == 'A') {
            require 'model/CourseModel.php';
            $model = new CourseModel();
            $result = $model->reactivate($_POST["initials"]);
            echo json_encode($result);
        } else if (SSession::getInstance()->permissions == 'A') {
            require 'model/CourseModel.php';
            $model = new CourseModel();
            $result = $model->selectAllDelete();
            $this->view->show("reactivateCourseView.php", $result);
        } else {
            $this->view->show("404View.php");
        }
    }

    /**
     * @return null
     * @param integer $initials Identificador de entidad
     * @param string $name Nombre de entidad
     * @param string $description descripcion de entidad
     * @param string $instrument instrumento de entidad
     * Funcion para actualizar curso
     */
    function update() {
        if (isset($_POST["initials"]) && isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["instrument"]) && SSession::getInstance()->permissions == 'A') {
            require 'model/CourseModel.php';
            $model = new CourseModel();
            $result = $model->update($_POST["initials"], $_POST["name"], $_POST["description"], $_POST["instrument"]);
            echo json_encode($result);
        } else if (SSession::getInstance()->permissions == 'A') {
            require 'model/CourseModel.php';
            $model = new CourseModel();
            $result = $model->selectAll();
            $this->view->show("updateCourseView.php", $result);
        } else {
            $this->view->show("404View.php");
        }
    }

}
