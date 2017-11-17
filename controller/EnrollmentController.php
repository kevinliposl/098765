<?php

/**
 * @authors <kevin.sandoval@ucr.ac.cr><diego.cendenofonseca@ucr.ac.cr><elena.calderonfernandez@ucr.ac.cr><brogudbarrientos@gmail.com>
 * @version 1.0
 * @copyright (c) 2017, Funcion Academia Musical
 * @access public
 * @category controller
 * Class Matricula
 */
class EnrollmentController {

    public function __construct() {
        $this->view = new View();
    }

    /**
     * @return null
     * Funcion para seleccionar una matricula
     */
    public function select() {
        if (SSession::getInstance()->permissions == 'A') {
            require 'model/StudentModel.php';
            $model = new StudentModel();

            $result = $model->selectStudentEnrolled();
            $this->view->show("selectEnrollmentView.php", $result);
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * @param integer $identification Identificador de estudiante
     * Funcion para seleccionar todos los cursos matriculados
     */
    public function selectCourses() {
        if (SSession::getInstance()->permissions == 'A') {
            require 'model/CourseModel.php';
            $model = new CourseModel();

            $result = $model->selectCoursesStudent($_POST["identification"]);
            echo json_encode($result);
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * @param integer $identification Identificador de estudiante
     * Funcion para seleccionar todos los cursos sin matricular
     */
    public function selectCourseNotStudent() {
        if (SSession::getInstance()->permissions == 'A') {
            require 'model/EnrollmentModel.php';
            $model = new EnrollmentModel();

            $result = $model->selectCoursesNotStudent($_POST["identification"]);
            echo json_encode($result);
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * @param integer $identification Identificador de estudiante
     * Funcion para eliminar matricula de un estudiante
     */
    public function delete() {
        if (SSession::getInstance()->permissions == 'A') {
            if (isset($_POST["ID"])) {
                require 'model/EnrollmentModel.php';
                $model = new EnrollmentModel();

                $result = $model->deleteEnrollment($_POST["ID"]);
                echo json_encode($result);
            } else {
                require 'model/StudentModel.php';
                $model = new StudentModel();

                $result = $model->selectStudentEnrolled();
                $this->view->show("deleteEnrollmentView.php", $result);
            }
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * @param string[] $id-courses Identificador de cursos
     * @param integer id-student Identificador de estudiante
     * Funcion para insertar una matricula
     */
    public function insert() {
        if (SSession::getInstance()->permissions == 'A') {
            if (isset($_POST['id-courses']) && isset($_POST['id-student'])) {
                require 'model/EnrollmentModel.php';
                $model = new EnrollmentModel();
                $ids = "";
                $num_ids = 0;
                foreach ($_POST['id-courses'] as $valorActual) {
                    if ($ids == '') {
                        $ids = $valorActual;
                    } else {
                        $ids = $valorActual . "," . $ids;
                    }
                    $num_ids = $num_ids + 1;
                }//for        
                $result = $model->insertEnrollment($_POST['id-student'], $ids, $num_ids);
                echo json_encode($result);
            } else {
                require 'model/StudentModel.php';
                $model = new StudentModel();

                $result = $model->selectAllStudent();
                $this->view->show("insertEnrollmentView.php", $result);
            }
        } else {
            $this->view->show("indexView.php");
        }
    }

}
