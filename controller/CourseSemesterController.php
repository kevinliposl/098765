<?php

/**
 * @authors <kevin.sandoval@ucr.ac.cr><diego.cendenofonseca@ucr.ac.cr><elena.calderonfernandez@ucr.ac.cr><brogudbarrientos@gmail.com>
 * @version 1.0
 * @copyright (c) 2017, Funcion Academia Musical
 * @access public
 * @category controller
 * Class CursoSemestre     
 */
class CourseSemesterController {

    function __construct() {
        $this->view = new View();
    }

    /**
     * @return null
     * @param integer $ID_Semester Identificador de semestre
     * @param string[] $professors identificador de profesor
     * @param string $initials identificador de curso
     * Funcion para insertar curso en semestre
     */
    function insert() {
        if (isset($_POST['professors']) && isset($_POST['ID_Semester']) && isset($_POST['initials']) && SSession::getInstance()->permissions == 'A') {
            require 'model/CourseSemesterModel.php';
            $model = new CourseSemesterModel();
            $professors = "";
            $num_professors = 0;
            foreach ($_POST['professors'] as $valorActual) {
                if ($professors == '' || $professors == '-1') {
                    $professors = $valorActual;
                } else {
                    $professors = $valorActual . "," . $professors;
                }
                $num_professors = $num_professors + 1;
            }//for        
            $result = $model->insertCourseSemester($_POST['ID_Semester'], $_POST['initials'], $professors, $num_professors);
            echo json_encode($result);
        } else if (SSession::getInstance()->permissions == 'A') {
            require 'model/SemesterModel.php';
            $model = new SemesterModel();
            $result = $model->selectAll();
            $this->view->show("insertCourseSemesterView.php", $result);
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * Funcion para seleccionar todos los semestres
     */
    function select() {
        if (SSession::getInstance()->permissions == 'A') {
            require 'model/SemesterModel.php';
            $model = new SemesterModel();
            $result = $model->selectAll();
            $this->view->show("selectCourseSemesterView.php", $result);
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * @param integer $ID_Semester Identificador de semestre
     * Funcion para seleccionar todos los cursos por semestre administrador
     */
    function selectAllCoursesSemester() {
        if (isset($_POST['ID_Semester']) && SSession::getInstance()->permissions == 'A') {
            require 'model/CourseSemesterModel.php';
            $model = new CourseSemesterModel();
            $result = $model->selectAllCourseSemester($_POST['ID_Semester']);
            echo json_encode($result);
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * @param integer $ID_Semester Identificador de semestre
     * @param string $initials Identificador de curso
     * Funcion para seleccionar los profesores que no estan inscritos en un curso del semestre
     */
    function selectNotAllProfessorsCourseSemester() {
        if (isset($_POST['ID_Semester']) && isset($_POST['initials']) && SSession::getInstance()->permissions == 'A') {
            require 'model/CourseSemesterModel.php';
            $model = new CourseSemesterModel();
            $result = $model->selectNotAllProfessorsCourseSemester($_POST['ID_Semester'], $_POST['initials']);
            echo json_encode($result);
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * @param integer $ID_Semester Identificador de semestre
     * @param string $initials Identificador de curso
     * Funcion para seleccionar los profesores inscritos en un curso del semestre
     */
    function selectAllProfessorsCourseSemester() {
        if (isset($_POST['ID_Semester']) && isset($_POST['initials']) && SSession::getInstance()->permissions == 'A') {
            require 'model/CourseSemesterModel.php';
            $model = new CourseSemesterModel();
            $result = $model->selectAllProfessorsCourseSemester($_POST['ID_Semester'], $_POST['initials']);
            echo json_encode($result);
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * @param integer $ID_Semester Identificador de semestre
     * @param string $initials Identificador de curso
     * Funcion para eliminar curso del semestre administrador
     */
    function deleteCourse() {
        if (isset($_POST["ID_Semester"]) && isset($_POST["initials"]) && SSession::getInstance()->permissions == 'A') {
            require 'model/CourseSemesterModel.php';
            $model = new CourseSemesterModel();
            $result = $model->deleteCourseSemester($_POST['ID_Semester'], $_POST['initials']);
            echo json_encode($result);
        } else if (SSession::getInstance()->permissions == 'A') {
            require 'model/SemesterModel.php';
            $model = new SemesterModel();
            $result = $model->selectAll();
            $this->view->show("deleteCourseSemesterView.php", $result);
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * @param integer $ID_Semester Identificador de semestre
     * @param string $initials Identificador de curso
     * @param integer $identification Identificador de profesor
     * Funcion para eliminar un profesor de un curso del semestre
     */
    function deleteProfessor() {
        if (isset($_POST["ID_Semester"]) && isset($_POST["initials"]) && isset($_POST["identification"]) && SSession::getInstance()->permissions == 'A') {
            require 'model/CourseSemesterModel.php';
            $model = new CourseSemesterModel();
            $result = $model->deleteProfessorCourseSemester($_POST['ID_Semester'], $_POST['initials'], $_POST['identification']);
            echo json_encode($result);
        } else if (SSession::getInstance()->permissions == 'A') {
            require 'model/SemesterModel.php';
            $model = new SemesterModel();
            $result = $model->selectAll();
            $this->view->show("deleteProfessorCourseSemesterView.php", $result);
        } else {
            $this->view->show("indexView.php");
        }
    }
    
    /**
     * @return null
     * @param integer $ID_Semester Identificador de semestre
     * @param string[] $professors identificador de profesor
     * @param string $initials identificador de curso
     * Funcion para insertar curso en semestre
     */
    function reactivare() {
        if (isset($_POST['professors']) && isset($_POST['ID_Semester']) && isset($_POST['initials']) && SSession::getInstance()->permissions == 'A') {
            require 'model/CourseSemesterModel.php';
            $model = new CourseSemesterModel();
            $professors = "";
            $num_professors = 0;
            foreach ($_POST['professors'] as $valorActual) {
                if ($professors == '' || $professors == '-1') {
                    $professors = $valorActual;
                } else {
                    $professors = $valorActual . "," . $professors;
                }
                $num_professors = $num_professors + 1;
            }//for        
            $result = $model->insertCourseSemester($_POST['ID_Semester'], $_POST['initials'], $professors, $num_professors);
            echo json_encode($result);
        } else if (SSession::getInstance()->permissions == 'A') {
            require 'model/SemesterModel.php';
            $model = new SemesterModel();
            $result = $model->selectAll();
            $this->view->show("reactivateCourseSemesterView.php", $result);
        } else {
            $this->view->show("404View.php");
        }
    }
}
