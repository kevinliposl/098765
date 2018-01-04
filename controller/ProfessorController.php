<?php

/**
 * @authors <kevin.sandoval@ucr.ac.cr><diego.cendenofonseca@ucr.ac.cr><elena.calderonfernandez@ucr.ac.cr><brogudbarrientos@gmail.com>
 * @version 1.0
 * @copyright (c) 2017, Funcion Academia Musical
 * @access public
 * @category controller
 * Class Admin     
 */
class ProfessorController {

    function __construct() {
        $this->view = new View();
    }

    /**
     * @return null
     * @param integer $id Identificador de entidad
     * @param string $email Email de entidad
     * @param string $name Nombre de entidad typeId            
     * @param string $firstLastName Apellido de entidad
     * @param string $secondLastName Apellido de entidad
     * @param string $nationality nacionalidad de entidad
     * @param string $address direccion de entidad
     * @param string $gender genero de entidad
     * @param string $phone nacionalidad de entidad
     * @param string $phone2 nacionalidad de entidad
     * @param string $additionalInformation nacionalidad de entidad
     * @param integer $age nacionalidad de entidad
     * Funcion para insertar profesor
     */
    function insert() {
        if (SSession::getInstance()->permissions == 'A') {
            if (isset($_POST["identification"])) {
                require 'model/ProfessorModel.php';
                $model = new ProfessorModel();
                $result = $model->insertProfessor($_POST["identification"], $_POST["name"], $_POST["firstLastName"], $_POST["secondLastName"], $_POST["gender"], $_POST["nationality"], $_POST["address"], $_POST["typeId"], $_POST["phone"], $_POST["cel_phone"], $_POST["expedient"], $_POST["email"], $_POST["birthdate"]);
                if ($result['result'] === '1') {
                    $mail = SMail::getInstance();
                    if ($mail->sendMail($_POST["email"], 'Contraseña de ingreso al sitio', 'Hola, gracias por formar parte de la academia, la contraseña'
                                    . ' de ingreso al sitio es... <br><h1>' . $result['password'] . '</h1>')) {
                        echo json_encode($result);
                    } else {
                        $result['result'] = "2";
                        echo json_encode($result);
                    }
                } else {
                    echo json_encode($result);
                }
            } else {
                $file = file_get_contents("libs/nationalities.json");
                $this->view->show("insertProfessorView.php", json_decode($file, true));
            }//else
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * @return null
     * @param integer $id Identificador de entidad
     * Funcion para eliminar profesor
     */
    function delete() {
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

    /**
     * @return null
     * @param integer $id Identificador de entidad
     * @param string $email Email de entidad
     * @param string $name Nombre de entidad typeId            
     * @param string $firstLastName Apellido de entidad
     * @param string $secondLastName Apellido de entidad
     * @param string $nationality nacionalidad de entidad
     * @param string $address direccion de entidad
     * @param string $gender genero de entidad
     * @param string $phone nacionalidad de entidad
     * @param string $phone2 nacionalidad de entidad
     * @param string $additionalInformation nacionalidad de entidad
     * @param integer $age nacionalidad de entidad
     * Funcion para actualizar profesor
     */
    function update() {
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
     * @return null
     * @param integer $id Identificador de entidad
     * Funcion para seleccionar profesor
     */
    function select() {
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
     * @return null
     * @param integer $identification Identificador de entidad
     * Funcion para seleccionar informacion de perfil

      function personalSelection() {
      if (SSession::getInstance()->permissions == 'T') {
      require 'model/ProfessorModel.php';
      $model = new ProfessorModel();

      $session = SSession::getInstance();

      $result = $model->selectProfessor($session->identification);
      $this->view->show("selectProfessorDataView.php", $result);
      } else {
      $this->view->show("indexView.php");
      }
      }
     */

    /**
     * @return null
     * @param integer $id Identificador de entidad
     * @param string $email Email de entidad
     * @param string $name Nombre de entidad typeId            
     * @param string $firstLastName Apellido de entidad
     * @param string $secondLastName Apellido de entidad
     * @param string $nationality nacionalidad de entidad
     * @param string $address direccion de entidad
     * @param string $gender genero de entidad
     * @param string $phone nacionalidad de entidad
     * @param string $phone2 nacionalidad de entidad
     * @param string $additionalInformation nacionalidad de entidad
     * @param integer $age nacionalidad de entidad
     * Funcion para actualizar informacion personal
     */
    function updatePersonal() {
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

}
